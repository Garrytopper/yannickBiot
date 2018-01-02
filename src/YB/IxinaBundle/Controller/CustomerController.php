<?php

namespace YB\IxinaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use YB\IxinaBundle\Form\CustomerType;
use YB\IxinaBundle\Entity\Customer;
use YB\IxinaBundle\Entity\Plan;

class CustomerController extends Controller
{
    public function newAction(REQUEST $request, $origine)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $newCustomer = new Customer();
        $newCustomer->setUser($user);

        $form = $this->get('form.factory')->create(CustomerType::class, $newCustomer);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em->persist($newCustomer);
                $em->flush();
                return $this->redirectToRoute('yb_ixina_homepage');
            }
        }
        return $this->render('YBIxinaBundle:Customer:form.html.twig', array('form' => $form->createView(), 'origine' => $origine));
    }

    public function modifAction(REQUEST $request, $id, $origine)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('YBIxinaBundle:Customer')->find($id);
        $form = $this->get('form.factory')->create(CustomerType::class, $client);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em->persist($client);
                $em->flush();
                return $this->redirectToRoute('yb_ixina_tableau');
            }
        }
        return $this->render('YBIxinaBundle:Customer:form.html.twig', array('client' => $client, 'form' => $form->createView(), 'origine' => $origine));
    }

    public function suppAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('YBIxinaBundle:Customer')->find($id);
        $em->remove($client);
        $em->flush();
        return $this->redirectToRoute('yb_ixina_tableau');
    }
}