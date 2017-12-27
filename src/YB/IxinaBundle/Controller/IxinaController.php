<?php

namespace YB\IxinaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use YB\IxinaBundle\Form\CustomerType;
use YB\IxinaBundle\Entity\Customer;

class IxinaController extends Controller
{
    public function homeAction(REQUEST $request)
    {
        $Client = new Customer();
        $form = $this->get('form.factory')->create(CustomerType::class, $Client);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                return $this->render('YBIxinaBundle::ixinaHome.html.twig', array('form' => $form->createView()));
            }
        }
        return $this->render('YBIxinaBundle::ixinaHome.html.twig', array('form' => $form->createView()));
    }
}
