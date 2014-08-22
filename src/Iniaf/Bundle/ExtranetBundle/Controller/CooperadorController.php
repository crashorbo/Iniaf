<?php

namespace Iniaf\Bundle\ExtranetBundle\Controller;

use Iniaf\Bundle\CooperadorBundle\Entity\Cooperador;
use Iniaf\Bundle\CooperadorBundle\Form\CooperadorType;
use Iniaf\Bundle\CooperadorBundle\Model\CooperadorModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;


class CooperadorController extends Controller
{
    public function crearAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.context')->getToken()->getUser();
        $entity = new CooperadorModel();
        $form = $this->createForm(new CooperadorType(), $entity);

        return $this->render('ExtranetBundle:Cooperador:crear.html.twig', array(
            'form'  =>  $form,
            'id'    =>  $id,
            'usuario'   =>  $usuario
        ));
    }

}