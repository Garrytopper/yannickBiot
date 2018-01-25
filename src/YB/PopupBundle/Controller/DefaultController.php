<?php

namespace YB\PopupBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YBPopupBundle:Default:index.html.twig');
    }
}
