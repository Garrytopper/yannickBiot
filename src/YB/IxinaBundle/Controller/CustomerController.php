<?php

namespace YB\IxinaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use YB\IxinaBundle\Form\CustomerType;
use YB\IxinaBundle\Entity\Customer;
use YB\IxinaBundle\Entity\Plan;
use YB\IxinaBundle\Entity\Plantech;
use YB\IxinaBundle\Entity\Prestation;
use YB\IxinaBundle\Form\VenteType;
use YB\IxinaBundle\Entity\Facturation;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use YB\IxinaBundle\Entity\RelCheque;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

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
                /* je controle si le projet est juste vendu */
                $etat = $newCustomer->getEtatDossier();
                $montantVenteTTC = $newCustomer->getMontantVenteTTC();
                $id = $newCustomer->getId();
                if ($etat == 'Vendu' AND $montantVenteTTC == null) {
                   return $this->redirectToRoute('yb_ixina_vente', array('id' => $id));
                }
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
                /* je controle si le projet est juste vendu */
                $etat = $client->getEtatDossier();
                $montantVenteTTC = $client->getMontantVenteTTC();
                $id = $client->getId();
                if ($etat == 'Vendu' AND $montantVenteTTC == null) {
                   return $this->redirectToRoute('yb_ixina_vente', array('id' => $id));
                }
                if ($origine == 'prestation') {
                    return $this->redirectToRoute('yb_ixina_listePrestation');
                }
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

    public function venteAction(Request $request, $id)
    {
        $test = $this->get('yb_popup.test');
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('YBIxinaBundle:Customer')->find($id);
        $form = $this->get('form.factory')->create(VenteType::class, $client);
        $relance = new RelCheque();
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $relance);
        $formBuilder->add('montant', MoneyType::class, array( 'required' => false, 'attr' => array('style' => 'width: 50px')))
                    ->add('nomCheque', TextType::class, array('required' => false))
                    ->add('dateRelance', DateType::class, array('required' => false));
        $form2 = $formBuilder->getForm();
        $prestation = new Prestation();
        $formBuilder2 = $this->get('form.factory')->createBuilder(FormType::class, $prestation);
        $formBuilder2->add('finitions', TextareaType::class, array('required' => false, 'attr' => array('cols' => 18, 'rows' => 8)))
                    ->add('produit', TextType::class, array('required' => false, 'attr' => array('style' => 'height: 45px;')))
                    ->add('fournisseur', ChoiceType::class, array('required' => false, 'choices' => array(
                        'Aztiria' => 'Aztiria',
                        'Lechner' => 'Lechner',
                        'MiraLuver' => 'MiraLuver')
                    ));
        $form3 = $formBuilder2->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            $form2->handleRequest($request);
            $form3->handleRequest($request);
            if ($form->isValid()) {
                $fairePlanTech = $client->getfairePlanTech();
                if ($fairePlanTech == true) {
                    $nom = $client->getNom();
                    $planTech = new PlanTech();
                    $planTech->setClient($nom);
                    $em->persist($planTech);
                }
                $faireFactureAcompte = $client->getFaireFactureAcompte();
                if ($faireFactureAcompte == true) {
                    $facture = new Facturation();
                        $nom = $client->getNom();
                    $facture->setNom($nom);
                        $ad1 = $client->getPostalAd1();
                    $facture->setAd1($ad1);
                        $ad2 = $client->getPostalAd2();
                    $facture->setAd2($ad2);
                        $cp = $client->getPostalCp();
                    $facture->setCp($cp);
                        $ville = $client->getPostalVille();
                    $facture->setVille($ville);
                        $montantVente = $client->getMontantVenteTTC();
                    $facture->setMontantVente($montantVente);
                        $reno = $client->getRenovation();
                    if ($reno == true) {
                        $facture->setTva(0.1);
                    }
                    elseif ($reno == false) {
                        $facture->setTva(0.2);
                    }
                    $montantAcompte = $client->getMontantAcompte();
                    $facture->setMontantAcompte($montantAcompte);
                    $facture->setTypeFacture('Acompte');
                    $em->persist($facture);
                }
                if($form2->isValid()) {
                    $faireRelanceCheque = $client->getFaireRelanceCheque();
                    if ($faireRelanceCheque == true) {
                        $nom = $client->getNom();
                            $relance->setNom($nom);
                        $tel = $client->getNumTel();
                            $relance->setTel($tel);
                        $email = $client->getEmail();
                            $relance->setEmail($email);
                            $relance->setOrigine('Acompte');
                        $em->persist($relance);
                    }
                }
                $fairePrestation = $client->getPrestation();
                if($fairePrestation == true) {
                    $prestation->setClient($client);
                    $em->persist($prestation);
                }                
                $em->flush();
                return $this->redirectToRoute('yb_ixina_tableau');
            }
        }
        return $this->render('YBIxinaBundle:Customer:vente.html.twig', array('form' => $form->createView(),
                                                                             'form2' => $form2->createView(),
                                                                             'form3' => $form3->createView()));
    }
}