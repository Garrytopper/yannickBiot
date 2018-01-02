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
        $clientsToday = $em->getRepository('YBIxinaBundle:Customer')->ClientsToday();
        return $this->render('YBIxinaBundle::ixinaHome.html.twig', array('clientsToday' => $clientsToday));
    }
}
