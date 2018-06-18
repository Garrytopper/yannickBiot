<?php

namespace YB\IxinaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use YB\IxinaBundle\Form\CustomerType;
use YB\IxinaBundle\Entity\Customer;
use YB\IxinaBundle\Entity\Plan;
use YB\IxinaBundle\Entity\TacheParticuliere;
use YB\IxinaBundle\Entity\DossierMetre;

class IxinaController extends Controller
{
    public function homeAction(REQUEST $request)
    {
        
        $em = $this->getDoctrine()->getManager();
        $customerRepository = $em->getRepository('YBIxinaBundle:Customer');
        $relChequeRepository = $em->getRepository('YBIxinaBundle:RelCheque');
        $plansRepository = $em->getRepository('YBIxinaBundle:Plantech');
        $facturesRepository = $em->getRepository('YBIxinaBundle:Facturation');
        $prestationRepository = $em->getRepository('YBIxinaBundle:Prestation');
        
        $today = new \dateTime('now');
        $today = $today->format('y-m-d');
        $todayTstp = strtotime($today);
        /* définition des alertes pour dessin et preparation */
        $oneDayTstp = 86400;
        $alerteOrange = 4; /* 3 jours */
        $alerteRouge = 2; /* 2jours */
        $alerteDessin = null;
        $alertePreparation = null;
        /* récupération des clients  en retour aujourd'hui */
        $clientsToday = $customerRepository->ClientsToday();
        /* comptage du nombre de dessin et de préparation */
        $clientsDessin = $customerRepository->ClientsDessin();
        $nbrClientDessin = count($clientsDessin);
        $clientsPreparer = $customerRepository->ClientsPreparer();
        $nbrClientPreparer = count($clientsPreparer);
        /* récupération du premier dessin à faire et comparaison avec aujourd'hui pour définir le niveau d'alerte */
        $firstDessin = $customerRepository->firstDessin();
        if ($firstDessin != null) {
            $dateDessin = $firstDessin[0]->getDateProchaineAction();
            $dateDessin = $dateDessin->format('y-m-d');
            $dateDessinTstp = strtotime($dateDessin);
            $diffDateDessin = ($dateDessinTstp - $todayTstp) / $oneDayTstp;
            if ( $alerteRouge < $diffDateDessin and $diffDateDessin < $alerteOrange) {
                $alerteDessin = 'Orange';
            }
            elseif ($diffDateDessin < $alerteRouge) {
                $alerteDessin = 'Rouge';
            }
        }
        /* récupération de la première récupération à faire et comparaison avec aujourd'hui pour définir le niveau d'alerte */
        $firstPreparation = $customerRepository->firstPreparation();
        if ($firstPreparation != null) {
            $datePreparation = $firstPreparation[0]->getDateProchaineAction();
            $datePreparation = $datePreparation->format('y-m-d');
            $datePreparationTstp = strtotime($datePreparation);
            $diffDatePreparation = ($datePreparationTstp - $todayTstp)  / $oneDayTstp ;
            if ( $alerteRouge < $diffDatePreparation and $diffDatePreparation < $alerteOrange) {
              $alertePreparation = 'Orange';
            }
            elseif ($diffDatePreparation < $alerteRouge) {
                $alertePreparation = 'Rouge';
            }
        }
        else{
            $datePreparationTstp = null;
            $diffDatePreparation = null;
        }
        /* récupération des relances de chèque à faire à partir d'aujourd'hui */
        $relancesCheque = $relChequeRepository->relanceToday();
        $nbrRelanceCheque = count($relancesCheque);

        /* récupération des plans techniques à faire */
        $plans = $plansRepository->findAll();
        $nbrPlans = count($plans);

        /* récupération des factures à faire */
        $factures = $facturesRepository->findAll();
        $nbrFactures = count($factures);

        /* récupération des taches à faire */
        $taches = $em->getRepository('YBIxinaBundle:TacheParticuliere')->findAll();
        $nbrTache = count($taches);

        /* récupération des Dossier de métré à faire */
        $dossiers = $em->getRepository('YBIxinaBundle:DossierMetre')->findAll();
        $nbrDossierMetre = count($dossiers);

        /* récupération des prestations de service et tri en fonction de l'action */
        $twoMonth = $oneDayTstp * 60;
        $twoWeek = $oneDayTstp * 15;
        $nbrValidation = 0;
        $nbrRappel = 0;
        $nbrPlanif = 0;
        $prestations = $prestationRepository->findAllByDate();
        foreach ($prestations as $prestation) {
            $datelivTstp = $prestation->getTimeDateLiv();
            $rappel = $prestation->getRappel();
            $valide = $prestation->getValidation();
            $planif = $prestation->getPlanif();
            if ($valide == false) {
                $nbrValidation ++;
            }
            if (($datelivTstp - $todayTstp < $twoMonth) and $rappel == false ) {
                $nbrRappel ++;
            }
            if (($datelivTstp - $todayTstp < $twoWeek) and $planif == false){
                $nbrPlanif ++;
            }

        }

        return $this->render('YBIxinaBundle::ixinaHome.html.twig', array('clientsToday' => $clientsToday, 
                                                                        'nbrClientDessin' => $nbrClientDessin, 
                                                                        'nbrClientsPreparer' => $nbrClientPreparer,
                                                                        'alerteDessin' => $alerteDessin,
                                                                        'alertePreparation' => $alertePreparation,
                                                                        'nbrRelanceCheque' => $nbrRelanceCheque,
                                                                        'nbrPlans' => $nbrPlans,
                                                                        'datePreparTSP' => $datePreparationTstp,
                                                                        'today' => $todayTstp,
                                                                        'diff' => $diffDatePreparation,
                                                                        'nbrFactures' => $nbrFactures,
                                                                        'nbrValidation' => $nbrValidation,
                                                                        'nbrRappel' => $nbrRappel,
                                                                        'nbrPlanif' => $nbrPlanif,
                                                                        'nbrTache' => $nbrTache,
                                                                        'nbrDossierMetre' => $nbrDossierMetre
                                                                        ));
    }

    public function comAction()
    {
        return $this->render('YBIxinaBundle:com:com.html.twig');
    }

    public function showroomAction()
    {
        return $this->render('YBIxinaBundle:Showroom:showroom.html.twig');
    }
}
