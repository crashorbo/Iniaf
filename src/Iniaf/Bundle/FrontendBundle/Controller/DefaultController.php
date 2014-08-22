<?php

namespace Iniaf\Bundle\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontendBundle:Default:index.html.twig');
    }

    public function loginAction()
    {
        return $this->render('BackendBundle:Default:index.html.twig');
    }
}
