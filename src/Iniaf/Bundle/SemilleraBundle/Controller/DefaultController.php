<?php

namespace Iniaf\Bundle\SemilleraBundle\Controller;

use Iniaf\Bundle\SemilleraBundle\Form\SemilleraType;
use Iniaf\Bundle\SemilleraBundle\Model\SemilleraModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $entity = new SemilleraModel();
        $form = $this->createForm(new SemilleraType(), $entity);
        return $this->render('SemilleraBundle:Default:index.html.twig', array('form' => $form->createView()));
    }
}
