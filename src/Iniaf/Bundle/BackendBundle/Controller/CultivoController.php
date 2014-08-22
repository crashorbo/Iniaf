<?php

namespace Iniaf\Bundle\BackendBundle\Controller;

use Iniaf\Bundle\SemillaBundle\Entity\Cultivo;
use Iniaf\Bundle\SemillaBundle\Entity\Tarifa;
use Iniaf\Bundle\SemillaBundle\Form\CultivoType;
use Iniaf\Bundle\SemillaBundle\Form\VariedadType;
use Iniaf\Bundle\SemillaBundle\Model\CultivoModel;
use Iniaf\Bundle\SemillaBundle\Model\VariedadModel;
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

        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $validar = $em->getRepository('SemillaBundle:Cultivo')->findByNombre($entity->nombre);
            if($validar == null)
            {
                $cultivo = new Cultivo();
                $cultivo->setNombre($entity->nombre);
                $em->persist($cultivo);
                $tarifaIns = new Tarifa('INSCRIPCION');
                $tarifaIns->setCultivo($cultivo);
                $tarifaCer = new Tarifa('CERTIFICACION');
                $tarifaCer->setCultivo($cultivo);
                $em->persist($tarifaIns);
                $em->persist($tarifaCer);
                $em->flush();
            }
        }
        return $this->redirect($this->generateUrl('backend_cultivo_home'));
    }

    public function variedadAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new VariedadModel();
        $form = $this->createForm(new VariedadType(), $entity);

        return $this->render('BackendBundle:Variedad:variedad.html.twig');
    }

    public function modificarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new CultivoModel();
        $form = $this->createForm(new CultivoType(), $entity);
        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $validar = $em->getRepository('SemillaBundle:Cultivo')->findByNombre($entity->nombre);
            if($validar == null)
            {
                $cultivo = $em->getRepository('SemillaBundle:Cultivo')->findOneById($id);
                $cultivo->setNombre($entity->nombre);
                $em->persist($cultivo);
            }
        }
        return $this->redirect($this->generateUrl('backend_cultivo_home'));
    }
}