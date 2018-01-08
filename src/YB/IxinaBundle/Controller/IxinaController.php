<?php

namespace YB\IxinaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use YB\IxinaBundle\Form\CustomerType;
use YB\IxinaBundle\Entity\Customer;
use YB\IxinaBundle\Entity\Plan;

class IxinaController extends Controller
{
    public function homeAction(REQUEST $request)
    {
        
        $em = $this->getDoctrine()->getManager();
        $customerRepository = $em->getRepository('YBIxinaBundle:Customer');
        $relChequeRepository = $em->getRepository('YBIxinaBundle:RelCheque');
        
        $today = new \dateTime('now');
        $today = $today->format('d/m/y');
        $todayTstp = strtotime($today);
        /* définition des alertes pour dessin et preparation */
        $oneDayTstp = 2674800;
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
            $dateDessin = $dateDessin->format('d/m/y');
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
            $datePreparation = $datePreparation->format('d/m/y');
            $datePreparationTstp = strtotime($datePreparation);
            $diffDatePreparation = ($datePreparationTstp - $todayTstp) / $oneDayTstp ;
            if ( $alerteRouge < $diffDatePreparation and $diffDatePreparation < $alerteOrange) {
              $alertePreparation = 'Orange';
            }
            elseif ($diffDatePreparation < $alerteRouge) {
                $alertePreparation = 'Rouge';
            }
        }
        /* récupération des relances de chèque à faire à partir d'aujourd'hui */
        $relancesCheque = $relChequeRepository->relanceToday();
        $nbrRelanceCheque = count($relancesCheque);

        return $this->render('YBIxinaBundle::ixinaHome.html.twig', array('clientsToday' => $clientsToday, 
                                                                        'nbrClientDessin' => $nbrClientDessin, 
                                                                        'nbrClientsPreparer' => $nbrClientPreparer,
                                                                        'alerteDessin' => $alerteDessin,
                                                                        'alertePreparation' => $alertePreparation,
                                                                        'nbrRelanceCheque' => $nbrRelanceCheque,
                                                                        'relancesCheque' => $relancesCheque
                                                                        ));
    }
}
