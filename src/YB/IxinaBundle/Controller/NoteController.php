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
use YB\IxinaBundle\Entity\Prestation;
use YB\IxinaBundle\Form\PrestationType;
use YB\IxinaBundle\Entity\TacheParticuliere;
use YB\IxinaBundle\Form\TacheParticuliereType;
use YB\IxinaBundle\Entity\DossierMetre;
use YB\IxinaBundle\Form\DossierMetreType;

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

   public function newprestationAction(Request $request)
   {
      $em = $this->getDoctrine()->getManager();
      $prestation = new Prestation();
      $form = $this->get('form.factory')->create(PrestationType::class, $prestation);
      if ($request->isMethod('POST')) {
        $form->handleRequest($request);
        if ($form->isValid()) {
          $em->persist($prestation);
          $em->flush();
          return $this->redirectToRoute('yb_ixina_newNote');
        }
      }
      return $this->render('YBIxinaBundle:Note:formprestation.html.twig', array('form' => $form->createView()));
   }

   public function listeprestationAction()
   {
    $em = $this->getDoctrine()->getManager();
    $prestations = $em->getRepository('YBIxinaBundle:Prestation')->findAllByDate();
    // définition de la limite alertes 
    $dateToday = new \dateTime('now');
    $dateTodayFormat = $dateToday->format('y-m-d');
    $todayTstp = strtotime($dateTodayFormat);
    $oneDayTstp = 86400;
    $twoMonth = $oneDayTstp * 60;
    $twoWeek = $oneDayTstp * 15;


    return $this->render('YBIxinaBundle:Note:consultprestation.html.twig', array('prestations' => $prestations, 
                                                                                'today' => $todayTstp,
                                                                                'deuxMois' => $twoMonth,
                                                                                'deuxSemaine' => $twoWeek ));
   }

   public function modifprestationAction(Request $request, $id)
   {
      $em = $this->getDoctrine()->getManager();
      $prestation = $em->getRepository('YBIxinaBundle:Prestation')->find($id);
      $form = $this->get('form.factory')->create(PrestationType::class, $prestation);
      if ($request->isMethod('POST')) {
          $form->handleRequest($request);
          if ($form->isValid()) {
              $em->persist($prestation);
              $em->flush();
              return $this->redirectToRoute('yb_ixina_listePrestation');
          }
      }
      return $this->render('YBIxinaBundle:Note:formprestation.html.twig', array('form' => $form->createView(),
                                                                                'prestation' => $prestation));

   }

   public function suppprestatationAction($id)
   {
      $em = $this->getDoctrine()->getManager();
      $prestation = $em->getRepository('YBIxinaBundle:Prestation')->find($id);
      $em->remove($prestation);
      $em->flush();
      return $this->redirectToRoute('yb_ixina_listePrestation');
   }

   public function listeTacheParticuliereAction()
   {
    $taches = $this->getDoctrine()->getManager()->getRepository('YBIxinaBundle:TacheParticuliere')->findAll();

    return $this->render('YBIxinaBundle:Note:consultTacheParticuliere.html.twig', array('taches' => $taches));
   }

   public function newTacheParticuliereAction(Request $Request)
   {
    $tache = new TacheParticuliere();
    $em = $this->getDoctrine()->getManager();

    $form = $this->get('form.factory')->create(TacheParticuliereType::class, $tache);
    if($Request->isMethod('POST'))
    {
      $form->handleRequest($Request);
      if($form->isValid())
      {
        $em->persist($tache);
        $em->flush();
        return $this->redirectToRoute('yb_ixina_listeTacheParticuliere');
      }
    }
    return $this->render('YBIxinaBundle:Note:formTacheParticuliere.html.twig', array('form' => $form->createView() ));
   }

   public function consultTacheParticuliereAction(Request $Request, $id)
   {
      $em = $this->getDoctrine()->getManager();
      $tache = $em->getRepository('YBIxinaBundle:TacheParticuliere')->find($id);
      $form = $this->get('form.factory')->create(TacheParticuliereType::class, $tache);
      if ($Request->isMethod('POST')) {
        $form->handleRequest($Request);
        if ($form->isValid()) {
          $em->flush();
          return $this->redirectToRoute('yb_ixina_listeTacheParticuliere');
        }
      }
      return $this->render('YBIxinaBundle:Note:formTacheParticuliere.html.twig', array('form' => $form->createView(), 'id' => $id ));
   }

   public function suppTacheParticuliereAction($id)
   {
      $em = $this->getDoctrine()->getManager();
      $tache = $em->getRepository('YBIxinaBundle:TacheParticuliere')->find($id);
      $em->remove($tache);
      $em->flush();
      return $this->redirectToRoute('yb_ixina_listeTacheParticuliere');

   }

   public function listeDossierMetreAction()
   {
      $dossiers = $this->getDoctrine()->getManager()->getRepository('YBIxinaBundle:DossierMetre')->findAll();
      return $this->render('YBIxinaBundle:Note:listeDossierMetre.html.twig', array('dossiers' => $dossiers));
   }

   public function newDossierMetreAction(Request $request)
   {
      $em = $this->getDoctrine()->getManager();
      $Dossier = new DossierMetre();

      $form = $this->get('form.factory')->create(DossierMetreType::class, $Dossier);
      if ($request->isMethod('POST')) {
        $form->handleRequest($request);
        if ($form->isValid()) {
          $em->persist($Dossier);
          $em->flush();
          return $this->redirectToRoute('yb_ixina_listeDossierMetre');
        }
      }
      return $this->render('YBIxinaBundle:Note:newDossierMetre.html.twig', array('form' => $form->createView()));
   }

   public function modifDossierMetreAction(Request $request, $id)
   {
      $em = $this->getDoctrine()->getManager();
      $dossier = $em->getRepository('YBIxinaBundle:DossierMetre')->find($id);
      $form = $this->get('form.factory')->create(DossierMetreType::class, $dossier);
      if ($request->isMethod('POST')) {
        $form->handleRequest($request);
        if ($form->isValid()) {
          $em->flush();
          return $this->redirectToRoute('yb_ixina_listeDossierMetre');
        }
      }
      return $this->render('YBIxinaBundle:Note:newDossierMetre.html.twig', array('form' => $form->createView(), 'id' => $id));
   }

   public function suppDossierMetreAction($id)
   {
      $em = $this->getDoctrine()->getManager();
      $dossier = $em->getRepository('YBIxinaBundle:DossierMetre')->find($id);
      $em->remove($dossier);
      $em->flush();
      return $this->redirectToRoute('yb_ixina_listeDossierMetre');

   }

}