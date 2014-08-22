<?php

namespace Iniaf\Bundle\CooperadorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CooperadorBundle:Default:index.html.twig', array('name' => $name));
    }
}
