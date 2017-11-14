<?php

namespace YB\DashBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashController extends Controller
{
    public function homeAction()
    {
        return $this->render('YBDashBundle::DashLayout.html.twig');
    }
}
