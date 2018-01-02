<?php

namespace YB\IxinaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use YB\IxinaBundle\Form\CustomerType;
use YB\IxinaBundle\Entity\Customer;
use YB\IxinaBundle\Entity\Plan;

class NoteController extends Controller
{
   public function homeAction()
   {
        return $this->render('YBIxinaBundle:Note:new.html.twig');
   }
}