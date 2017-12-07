<?php

namespace YB\IxinaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IxinaController extends Controller
{
    public function homeAction()
    {
        return $this->render('YBIxinaBundle::ixinaHome.html.twig');
    }
}
