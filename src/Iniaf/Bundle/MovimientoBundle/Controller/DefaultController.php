<?php

namespace Iniaf\Bundle\MovimientoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MovimientoBundle:Default:index.html.twig', array('name' => $name));
    }
}
