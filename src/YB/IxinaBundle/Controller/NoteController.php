<?php

namespace YB\IxinaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use YB\IxinaBundle\Form\CustomerType;
use YB\IxinaBundle\Entity\Customer;
use YB\IxinaBundle\Entity\Plan;
use YB\IxinaBundle\Form\RelChequeType;
use YB\IxinaBundle\Entity\RelCheque;
use YB\IxinaBundle\Entity\Plantech;
use YB\IxinaBundle\Form\PlantechType;
use YB\IxinaBundle\Entity\Facturation;
use YB\IxinaBundle\Form\FacturationType;

class NoteController extends Controller
{
   public function homeAction()
   {
        return $this->render('YBIxinaBundle:Note:layout.html.twig');
   }

   public function newrelchequeAction(Request $request)
   {
        $relCheque = new RelCheque();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(RelChequeType::class, $relCheque);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em->persist($relCheque);
                $em->flush();
                return $this->redirectToRoute('yb_ixina_newNote');
            }
        }
        return $this->render('YBIxinaBundle:Note:form.html.twig', array('form' => $form->createView()));
   }

   public function consultrelcheqAction()
   {
        $today = new \dateTime('now');
        $em = $this->getDoctrine()->getManager();
        $relancesCheq = $em->getRepository('YBIxinaBundle:RelCheque')->findAllRel();
        return $this->render('YBIxinaBundle:Note:consultrelcheq.html.twig', array('relances' => $relancesCheq, 'today' => $today));
   }

   public function modifrelcheqAction(Request $request, $id)
   {
        $em = $this->getDoctrine()->getManager();
        $relance = $em->getRepository('YBIxinaBundle:RelCheque')->find($id);
        $form = $this->get('form.factory')->create(RelChequeType::class, $relance);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em->persist($relance);
                $em->flush();
                return $this->redirectToRoute('yb_ixina_consultRelCheq');
            }
        }
        return $this->render('YBIxinaBundle:Note:form.html.twig', array('form' => $form->createView(), 'id' => $id));
   }

   public function supprelcheqAction($id)
   {
        $em = $this->getDoctrine()->getManager();
        $relance = $em->getRepository('YBIxinaBundle:RelCheque')->find($id);
        $em->remove($relance);
        $em->flush();
        return $this->redirectToRoute('yb_ixina_consultRelCheq');
   }

   public function newplantechAction(Request $request)
   {
      $em = $this->getDoctrine()->getManager();
      $planTech = new Plantech();
      $form = $this->get('form.factory')->create(PlantechType::class, $planTech);
      if ($request->isMethod('POST')) {
          $form->handleRequest($request);
          if ($form->isValid()) {
            $em->persist($planTech);
            $em->flush();
            return $this->redirectToRoute('yb_ixina_newNote');
          }
      }
      return $this->render('YBIxinaBundle:Note:formplantech.html.twig', array('form' => $form->createView()));
   }

   public function consultplantechAction()
   {
      $em = $this->getDoctrine()->getManager();
      $Plans = $em->getRepository('YBIxinaBundle:Plantech')->findAll();
      return $this->render('YBIxinaBundle:Note:consultplantech.html.twig', array('plans' => $Plans));
   }

   public function suppplantechAction($id)
   {
      $em = $this->getDoctrine()->getManager();
      $Plan = $em->getRepository('YBIxinaBundle:Plantech')->find($id);
      $em->remove($Plan);
      $em->flush();
      $Plans = $em->getRepository('YBIxinaBundle:Plantech')->findAll();

      return $this->render('YBIxinaBundle:Note:consultplantech.html.twig', array('plans' => $Plans));
   }

   public function newfactureAction(Request $request)
   {
      $em = $this->getDoctrine()->getManager();
      $facture = new Facturation();
      $form = $this->get('form.factory')->create(FacturationType::class, $facture);
      if ($request->isMethod('POST')) {
          $form->handleRequest($request);
          if ($form->isValid()) {
            $em->persist($facture);
            $em->flush();
            return $this->redirectToRoute('yb_ixina_newNote');
          }
      }
      return $this->render('YBIxinaBundle:Note:newfacture.html.twig', array('form' => $form->createView()));
   }

   public function consultfactureAction()
   {
      $em = $this->getDoctrine()->getManager();
      $factures = $em->getRepository('YBIxinaBundle:Facturation')->findAll();
      return $this->render('YBIxinaBundle:Note:consultfacture.html.twig', array('factures' => $factures));
   }

   public function suppfactureAction($id)
   {
      $em = $this->getDoctrine()->getManager();
      $Facture = $em->getRepository('YBIxinaBundle:Facturation')->find($id);
      $em->remove($Facture);
      $em->flush();
      $factures = $em->getRepository('YBIxinaBundle:Facturation')->findAll();

      return $this->render('YBIxinaBundle:Note:consultfacture.html.twig', array('factures' => $factures));
   }
}