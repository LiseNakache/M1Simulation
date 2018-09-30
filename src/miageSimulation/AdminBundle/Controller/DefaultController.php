<?php

namespace miageSimulation\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('miageSimulationAdminBundle:Default:index.html.twig');
    }
}
