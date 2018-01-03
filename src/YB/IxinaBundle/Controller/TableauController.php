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
        $clients = $RepositoryClient->ClientsByDateAction();
        $today = new \dateTime('now');
        return $this->render('YBIxinaBundle:Tableau:tableau.html.twig', array('clients' => $clients, 'today' => $today));
    }
}