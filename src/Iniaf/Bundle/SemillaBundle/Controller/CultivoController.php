<?php

namespace Iniaf\Bundle\SemillaBundle\Controller;

use Iniaf\Bundle\SemillaBundle\Entity\Cultivo;
use Iniaf\Bundle\SemillaBundle\Form\CultivoType;
use Iniaf\Bundle\SemillaBundle\Model\CultivoModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CultivoController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('SemillaBundle:Cultivo')->findAll();

        $entity = new CultivoModel();
        $form = $this->createForm(new CultivoType(), $entity);

        return $this->render('BackendBundle:Cultivo:index.html.twig', array(
            'entities'      =>  $entities,
            'form'          =>  $form->createView()
        ));
    }

    public function crearAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new CultivoModel();
        $form = $this->createForm(new CultivoType(), $entity);

        $form->handleRequest($request);

        $cultivo = new Cultivo();
        $cultivo->setNombre($entity->nombre);
        $em->persist($cultivo);
        $em->flush();

        return $this->redirect($this->generateUrl('semilla_cultivo_home'));
    }
}