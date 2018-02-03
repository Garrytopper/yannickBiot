<?php

namespace YB\IxinaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use YB\IxinaBundle\Form\CustomerType;
use YB\IxinaBundle\Entity\Customer;
use YB\IxinaBundle\Entity\Plan;

class TableauController extends Controller
{
    public function homeAction(REQUEST $request)
    {
        $em = $this->getDoctrine()->getManager();
        $RepositoryClient = $em->getRepository('YBIxinaBundle:Customer');
        $today = new \dateTime('now');

 /* Partie utilisé pour le dashboard du mois */

        $clientsPerduDuMois = $RepositoryClient->ClientsPerduMoisEnCours();
        $nbrePerduDuMois = count($clientsPerduDuMois);

        $clientsVenduDuMois = $RepositoryClient->ClientsVenduMoisEnCours();
        $nbrVenduDuMois = count($clientsVenduDuMois);

        $clientsProspectDuMois = $RepositoryClient->ClientsProspectMoisEnCours();
        $nbrProspectDuMois = count($clientsProspectDuMois);

        $newProspectDuMois = $RepositoryClient->NewProspectDuMois();
        $nbrNewProspectDuMois = count($newProspectDuMois);

        $clientsRetourDuMois = $RepositoryClient->ClientsRetourDuMois();
        $nbrRetourDuMois = count($clientsRetourDuMois);
       
        /* calcul du taux de concrétisation */
       
        $totalDossier = $nbrVenduDuMois + $nbrNewProspectDuMois + $nbrePerduDuMois ;
        if ($nbrVenduDuMois == 0 or $totalDossier == 0) {
            $TxConcret = 0;
        }
        else
        {
            $TxConcret = $nbrVenduDuMois * 100 / $totalDossier ;
            $TxConcret = round($TxConcret);
        }
       
        
        /* calcul du portefeuille du mois */

        $portefeuille = 0;
        foreach ($clientsRetourDuMois as $client) {
            $montant = $client->getBudgetClient();
            $portefeuille = $portefeuille + $montant;
        }

        /* calcul du chiffre d'affaire potentiel à faire avant la fin du mois */

        $CAPotentiel = $portefeuille / 2 / 1.2 ;
        $CAPotentiel = round($CAPotentiel);
        
/* partie utilisé pour la liste complète des clients par date de création */
        
        $clients = $RepositoryClient->ClientsByDateCreation();

        return $this->render('YBIxinaBundle:Tableau:tableau.html.twig', array('ClientsVenduMois' => $clientsVenduDuMois, 
                                                                            'ClientsPerdusDuMois' => $clientsPerduDuMois,
                                                                            'ClientsProspectsDuMois' => $clientsProspectDuMois,
                                                                            'nbrNewProspectDuMois' => $nbrNewProspectDuMois, 
                                                                            'today' => $today,
                                                                            'TxConcret' => $TxConcret,
                                                                            'portefeuille' => $portefeuille,
                                                                            'CAPotentiel' => $CAPotentiel,
                                                                            'clients' => $clients
                                                                            ));
    }
}