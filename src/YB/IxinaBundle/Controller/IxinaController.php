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
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $Client = new Customer();
        $Client->setUser($user);
        $form = $this->get('form.factory')->create(CustomerType::class, $Client);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em->persist($Client);
                $em->flush();
                $Client = new Customer();
                $form = $this->get('form.factory')->create(CustomerType::class, $Client);
                return $this->render('YBIxinaBundle::ixinaHome.html.twig', array('form' => $form->createView()));
            }
        }
        return $this->render('YBIxinaBundle::ixinaHome.html.twig', array('form' => $form->createView()));
    }
}
