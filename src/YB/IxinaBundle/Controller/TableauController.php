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

/* partie utiliser pour la liste des clients créé le mois en cours et le mois dernier */

        $clientsCreeMois = $RepositoryClient->ClientsCreeMoisEnCours();
        $nbrClientsCreeMois = count($clientsCreeMois);
        
        $ClientsCreeMoisVendu = $RepositoryClient->ClientsCreeLeMoisVendu();
        $nbrClientsCreeMoisVendu = count($ClientsCreeMoisVendu);
        
        $ClientsCreeMoisPerdu= $RepositoryClient->ClientsCreeLeMoisPerdu();
        $nbrClientsCreeMoisPerdu = count($ClientsCreeMoisPerdu);
        
        $ClientsCreeMoisProspect = $RepositoryClient->ClientsCreeLeMoisProspect();
        $nbrClientsCreeMoisProspect = count($ClientsCreeMoisProspect);

        if ($nbrClientsCreeMoisVendu != null AND $nbrClientsCreeMois != null) {
            $txConcretMinMois = $nbrClientsCreeMoisVendu * 100 / $nbrClientsCreeMois;
            $txConcretMinMois = round($txConcretMinMois);
        }
        else
        {
            $txConcretMinMois = 0;
        }
        
        if ($nbrClientsCreeMoisVendu != null) {
            $txConcretMaxMois = ($nbrClientsCreeMoisVendu + $nbrClientsCreeMoisProspect) * 100 / $nbrClientsCreeMois;
             $txConcretMaxMois = round($txConcretMaxMois);
        }
        else
        {
            $txConcretMaxMois = 0;
        }

        /* mois dernier */
        $clientsCreeMoisDernier = $RepositoryClient->ClientsCreeLeMoisDernier();
        $nbrClientsCreeMoisDernier = count($clientsCreeMoisDernier);
        
        $ClientsCreeMoisDernierVendu = $RepositoryClient->ClientsCreeLeMoisDernierVendu();
        $nbrClientsCreeMoisDernierVendu = count($ClientsCreeMoisDernierVendu);
        
        $ClientsCreeMoisDernierPerdu= $RepositoryClient->ClientsCreeLeMoisDernierPerdu();
        $nbrClientsCreeMoisDernierPerdu = count($ClientsCreeMoisDernierPerdu);
        
        $ClientsCreeMoisDernierProspect = $RepositoryClient->ClientsCreeLeMoisDernierProspect();
        $nbrClientsCreeMoisDernierProspect = count($ClientsCreeMoisDernierProspect);

        $txConcretMinMoisDernier = $nbrClientsCreeMoisDernierVendu * 100 / $nbrClientsCreeMoisDernier;
        $txConcretMinMoisDernier = round($txConcretMinMoisDernier);

        $txConcretMaxMoisDernier = ($nbrClientsCreeMoisDernierVendu + $nbrClientsCreeMoisDernierProspect) * 100 / $nbrClientsCreeMoisDernier;
        $txConcretMaxMoisDernier = round($txConcretMaxMoisDernier);

        $ClientsCreeMoisDernierVenduFige = $RepositoryClient->ClientsCreeMoisDernierVenduFige();
        $nbrClientsCreeMoisDernierVenduFige = count($ClientsCreeMoisDernierVenduFige);

        $ClientsCreeMoisDernierArelancer = $RepositoryClient->ClientsCreeLeMoisDernieArelancer();
        $nbrClientsCreeMoisDernierArelancer = count($ClientsCreeMoisDernierArelancer);

        $ClientsCreeMoisDernierRdv = $RepositoryClient->ClientsCreeMoisDernierRdv();
        $nbrClientsCreeMoisDernierRdv = count($ClientsCreeMoisDernierRdv);

        $ClientsPortefeuilleVenduMoisDernier = $RepositoryClient->ClientsPortefeuilleVenduMoisDernier();
        $nbrClientsPortefeuilleVenduMoisDernier = count($ClientsPortefeuilleVenduMoisDernier);

        $ClientsPortefeuillePerduMoisDernier = $RepositoryClient->ClientsPortefeuillePerduMoisDernier();
        $nbrClientsPortefeuillePerduMoisDernier = count($ClientsPortefeuillePerduMoisDernier);

        $totalVenteMoisDernier = $nbrClientsCreeMoisDernierVenduFige + $nbrClientsPortefeuilleVenduMoisDernier;
        $txVenteOuverture = $totalVenteMoisDernier * 100 / $nbrClientsCreeMoisDernier;
        $txVenteOuverture = round($txVenteOuverture);

        /* 2 mois dernier */
        $clientsCree2MoisDernier = $RepositoryClient->ClientsCreeLes2MoisDernier();
        $nbrClientsCree2MoisDernier = count($clientsCree2MoisDernier);
        
        $ClientsCree2MoisDernierVendu = $RepositoryClient->ClientsCreeLes2MoisDernierVendu();
        $nbrClientsCree2MoisDernierVendu = count($ClientsCree2MoisDernierVendu);
        
        $ClientsCree2MoisDernierPerdu= $RepositoryClient->ClientsCreeLes2MoisDernierPerdu();
        $nbrClientsCree2MoisDernierPerdu = count($ClientsCree2MoisDernierPerdu);
        
        $ClientsCree2MoisDernierProspect = $RepositoryClient->ClientsCreeLes2MoisDernierProspect();
        $nbrClientsCree2MoisDernierProspect = count($ClientsCree2MoisDernierProspect);

        $txConcretMin2MoisDernier = $nbrClientsCree2MoisDernierVendu * 100 / $nbrClientsCree2MoisDernier;
        $txConcretMin2MoisDernier = round($txConcretMin2MoisDernier);

        $txConcretMax2MoisDernier = ($nbrClientsCree2MoisDernierVendu + $nbrClientsCree2MoisDernierProspect) * 100 / $nbrClientsCree2MoisDernier;
        $txConcretMax2MoisDernier = round($txConcretMax2MoisDernier);

        /* 3 mois dernier */
        $clientsCree3MoisDernier = $RepositoryClient->ClientsCreeLes3MoisDernier();
        $nbrClientsCree3MoisDernier = count($clientsCree3MoisDernier);
        
        $ClientsCree3MoisDernierVendu = $RepositoryClient->ClientsCreeLes3MoisDernierVendu();
        $nbrClientsCree3MoisDernierVendu = count($ClientsCree3MoisDernierVendu);
        
        $ClientsCree3MoisDernierPerdu= $RepositoryClient->ClientsCreeLes3MoisDernierPerdu();
        $nbrClientsCree3MoisDernierPerdu = count($ClientsCree3MoisDernierPerdu);
        
        $ClientsCree3MoisDernierProspect = $RepositoryClient->ClientsCreeLes3MoisDernierProspect();
        $nbrClientsCree3MoisDernierProspect = count($ClientsCree3MoisDernierProspect);

        $txConcretMin3MoisDernier = $nbrClientsCree3MoisDernierVendu * 100 / $nbrClientsCree3MoisDernier;
        $txConcretMin3MoisDernier = round($txConcretMin3MoisDernier);

        $txConcretMax3MoisDernier = ($nbrClientsCree3MoisDernierVendu + $nbrClientsCree3MoisDernierProspect) * 100 / $nbrClientsCree3MoisDernier;
        $txConcretMax3MoisDernier = round($txConcretMax3MoisDernier);

        /* mois prochain */

        $clientsProspectDuMoisProchain = $RepositoryClient->clientsProspectDuMoisProchain();

        return $this->render('YBIxinaBundle:Tableau:tableau.html.twig', array('ClientsVenduMois' => $clientsVenduDuMois, 
                                                                            'ClientsPerdusDuMois' => $clientsPerduDuMois,
                                                                            'ClientsProspectsDuMois' => $clientsProspectDuMois,
                                                                            'nbrNewProspectDuMois' => $nbrNewProspectDuMois, 
                                                                            'today' => $today,
                                                                            'TxConcret' => $TxConcret,
                                                                            'portefeuille' => $portefeuille,
                                                                            'CAPotentiel' => $CAPotentiel,
                                                                            'clients' => $clients,
                                                                            'clientsCreeMois' => $clientsCreeMois,
                                                                            'nbrClientsCreeMois' => $nbrClientsCreeMois,
                                                                            'clientsCreeMoisDernier' => $clientsCreeMoisDernier,
                                                                            'clientsCree2MoisDernier' => $clientsCree2MoisDernier,
                                                                            'clientsCree3MoisDernier' => $clientsCree3MoisDernier,
                                                                            'nbrClientsCreeMoisDernier' => $nbrClientsCreeMoisDernier,
                                                                            'nbrClientsCree2MoisDernier' => $nbrClientsCree2MoisDernier,
                                                                            'nbrClientsCree3MoisDernier' => $nbrClientsCree3MoisDernier,
                                                                            'nbrClientsCreeMois' => $nbrClientsCreeMois,
                                                                            'nbrClientsCreeMoisDernierVendu' => $nbrClientsCreeMoisDernierVendu,
                                                                            'clientsCreeMoisDernierVendu' => $ClientsCreeMoisDernierVendu,
                                                                            'nbrClientsCree2MoisDernierVendu' => $nbrClientsCree2MoisDernierVendu,
                                                                            'nbrClientsCree3MoisDernierVendu' => $nbrClientsCree3MoisDernierVendu,
                                                                            'nbrClientsCreeMoisVendu' => $nbrClientsCreeMoisVendu,
                                                                            'nbrClientsCreeMoisDernierPerdu' => $nbrClientsCreeMoisDernierPerdu,
                                                                            'clientsCreeMoisDernierPerdu' => $ClientsCreeMoisDernierPerdu,
                                                                            'nbrClientsCree2MoisDernierPerdu' => $nbrClientsCree2MoisDernierPerdu,
                                                                            'nbrClientsCree3MoisDernierPerdu' => $nbrClientsCree3MoisDernierPerdu,
                                                                            'nbrClientsCreeMoisPerdu' => $nbrClientsCreeMoisPerdu,
                                                                            'nbrClientsCreeMoisDernierProspect' => $nbrClientsCreeMoisDernierProspect,
                                                                            'clientsCreeMoisDernierProspect' => $ClientsCreeMoisDernierProspect,
                                                                            'nbrClientsCree2MoisDernierProspect' => $nbrClientsCree2MoisDernierProspect,
                                                                            'nbrClientsCree3MoisDernierProspect' => $nbrClientsCree3MoisDernierProspect,
                                                                            'nbrClientsCreeMoisProspect' => $nbrClientsCreeMoisProspect,
                                                                            'txConcretMinMoisDernier' => $txConcretMinMoisDernier,
                                                                            'txConcretMin2MoisDernier' => $txConcretMin2MoisDernier,
                                                                            'txConcretMin3MoisDernier' => $txConcretMin3MoisDernier,
                                                                            'txConcretMinMois' => $txConcretMinMois,
                                                                            'txConcretMaxMoisDernier' => $txConcretMaxMoisDernier,
                                                                            'txConcretMax2MoisDernier' => $txConcretMax2MoisDernier,
                                                                            'txConcretMax3MoisDernier' => $txConcretMax3MoisDernier,
                                                                            'txConcretMaxMois' => $txConcretMaxMois,
                                                                            'nbrClientsCreeMoisDernierArelancer' => $nbrClientsCreeMoisDernierArelancer,
                                                                            'clientsCreeMoisDernierArelancer' => $ClientsCreeMoisDernierArelancer,
                                                                            'nbrClientsCreeMoisDernierPerdu' => $nbrClientsCreeMoisDernierPerdu,
                                                                            'clientsCreeMoisDernierPerdu' => $ClientsCreeMoisDernierPerdu,
                                                                            'nbrClientsCreeMoisDernierVenduFige' => $nbrClientsCreeMoisDernierVenduFige,
                                                                            'clientsCreeMoisDernierVenduFige' => $ClientsCreeMoisDernierVenduFige,
                                                                            'nbrClientsCreeMoisDernierProspect' => $nbrClientsCreeMoisDernierProspect,
                                                                            'clientsCreeMoisDernierProspect' => $ClientsCreeMoisDernierProspect,
                                                                            'nbrClientsCreeMoisDernierRdv' => $nbrClientsCreeMoisDernierRdv,
                                                                            'ClientsCreeMoisDernierRdv' => $ClientsCreeMoisDernierRdv,
                                                                            'ClientsPortefeuilleVenduMoisDernier' => $ClientsPortefeuilleVenduMoisDernier,
                                                                            'nbrClientsPortefeuilleVenduMoisDernier' => $nbrClientsPortefeuilleVenduMoisDernier,
                                                                            'ClientsPortefeuillePerduMoisDernier' => $ClientsPortefeuillePerduMoisDernier,
                                                                            'nbrClientsPortefeuillePerduMoisDernier' => $nbrClientsPortefeuillePerduMoisDernier,
                                                                            'totalVenteMoisDernier' => $totalVenteMoisDernier,
                                                                            'txVenteOuverture' => $txVenteOuverture,
                                                                            'clientsProspectDuMoisProchain' => $clientsProspectDuMoisProchain
                                                                            ));
    }
}