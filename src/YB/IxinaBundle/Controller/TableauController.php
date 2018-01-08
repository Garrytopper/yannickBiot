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
        
        $prospects = $RepositoryClient->ProspectByDateAction();
        $clientsPerduDuMois = $RepositoryClient->ClientsPerduMoisEnCours();
        $clientsVenduDuMois = $RepositoryClient->ClientsVenduMoisEnCours();
        $clientsProspectDuMois = $RepositoryClient->ClientsProspectMoisEnCours();
        $clientsRetourDuMois = $RepositoryClient->ClientsRetourDuMois();
        $today = new \dateTime('now');
        $nbrVendu = count($clientsVenduDuMois);
        $nbrNewProspect = count($clientsProspectDuMois);
        $nbrePerdu = count($clientsPerduDuMois);
        $totalDossier = $nbrVendu + $nbrNewProspect + $nbrePerdu ;
        $TxConcret = $nbrVendu * 100 / $totalDossier ;
        $portefeuille = 0;
        foreach ($clientsRetourDuMois as $client) {
            $montant = $client->getBudgetClient();
            $portefeuille = $portefeuille + $montant;
        }
        $CAPotentiel = $portefeuille / 2 / 1.2 ;

        $CAPotentiel = round($CAPotentiel);
        $TxConcret = round($TxConcret);

        return $this->render('YBIxinaBundle:Tableau:tableau.html.twig', array('ClientsVenduMois' => $clientsVenduDuMois, 
                                                                            'ClientsPerdusDuMois' => $clientsPerduDuMois,
                                                                            'prospects' => $prospects, 'today' => $today,
                                                                            'TxConcret' => $TxConcret,
                                                                            'nbrNewProspect' => $nbrNewProspect,
                                                                            'portefeuille' => $portefeuille,
                                                                            'CAPotentiel' => $CAPotentiel
                                                                            ));
    }
}