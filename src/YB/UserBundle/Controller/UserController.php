<?php

namespace YB\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function modifHomeAction()
    {
    	$userManager = $this->get('fos_user.user_manager');
    	$users = $userManager->findUsers();
        return $this->render('YBUserBundle:userModif:userHome.html.twig', array('users' => $users));
    }

    public function modifUserAction($id)
    {
    	$userManager = $this->get('fos_user.user_manager');
    	$user = $userManager->findUserBy(array('id' => $id));
    	return $this->render('YBUserBundle:userModif:userModif.html.twig', array('user' => $user));
    }

    public function modifRoleAction($id, $role, $action)
    {
    	$userManager = $this->get('fos_user.user_manager');
    	$user = $userManager->findUserBy(array('id' => $id));
    	if ($role == 'admin') {
    		if ($action == 'add') {
    			$user->setRoles(array('ROLE_ADMIN'));
                $userManager->updateUser($user);
    			return $this->render('YBUserBundle:userModif:userModif.html.twig', array('user' => $user));
    		}
    		if ($action == 'supp') {
    			$user->removeRole('ROLE_ADMIN');
                $userManager->updateUser($user);
    			return $this->render('YBUserBundle:userModif:userModif.html.twig', array('user' => $user));
    		}
    	}
    }
}