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
        
        $today = new \dateTime('now');
        $today = $today->format('d/m/y');
        $todayTstp = strtotime($today);
    
        $oneDayTstp = 2674800;
        $alerteOrange = 4; /* 3 jours */
        $alerteRouge = 2; /* 2jours */
        $alerteDessin = null;
        $alertePreparation = null;

        $clientsToday = $customerRepository->ClientsToday();

        $clientsDessin = $customerRepository->ClientsDessin();
        $nbrClientDessin = count($clientsDessin);
        $clientsPreparer = $customerRepository->ClientsPreparer();
        $nbrClientPreparer = count($clientsPreparer);

        $firstDessin = $customerRepository->firstDessin();
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

        $firstPreparation = $customerRepository->firstPreparation();
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

        return $this->render('YBIxinaBundle::ixinaHome.html.twig', array('clientsToday' => $clientsToday, 
                                                                        'nbrClientDessin' => $nbrClientDessin, 
                                                                        'nbrClientsPreparer' => $nbrClientPreparer,
                                                                        'alerteDessin' => $alerteDessin,
                                                                        'alertePreparation' => $alertePreparation
                                                                        ));
    }
}
