<?php

namespace YB\IxinaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use YB\UserBundle\Form\UserType;
use YB\UserBundle\Entity\User;

class IxinaController extends Controller
{
    public function homeAction()
    {
        return $this->render('YBIxinaBundle::ixinaHome.html.twig');
    }

    public function newUserAction(REQUEST $request)
    {
        $em = $this->getDoctrine()->getManager();
        $newUser = new User();
        $newUser->setSalt('');
        $newUser->setRoles(array('ROLE_ADMIN'));
        $form = $this->get('form.factory')->create(UserType::class, $newUser);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em->persist($newUser);
                $em->flush();
                return $this->redirectToRoute('yb_ixina_newUser');
            }
        }
        return $this->render('YBDashBundle:ixina:gestionUser.html.twig', array('form' => $form->createView()));
    }
}
