<?php

namespace Iniaf\Bundle\SemillaBundle\Controller;

use Iniaf\Bundle\SemillaBundle\Entity\Variedad;
use Iniaf\Bundle\SemillaBundle\Form\VariedadType;
use Iniaf\Bundle\SemillaBundle\Model\VariedadModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class VariedadController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('SemillaBundle:Variedad')->findAll();

        $entity = new VariedadModel();
        $form = $this->createForm(new VariedadType(), $entity);

        return $this->render('SemillaBundle:Variedad:index.html.twig', array(
            'entities'      =>  $entities,
            'form'          =>  $form->createView()
        ));
    }

    public function crearAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new VariedadModel();
        $form = $this->createForm(new VariedadType(), $entity);

        $form->handleRequest($request);

        $variedad = new Variedad();
        $cultivo = $em->getRepository('SemillaBundle:Cultivo')->findOneById($entity->cultivo);
        $variedad->setCultivo($cultivo);
        $variedad->setNombre($entity->nombre);
        $variedad->setNumeroRegistro($entity->numeroRegistro);
        $em->persist($variedad);
        $em->flush();

        return $this->redirect($this->generateUrl('semilla_variedad_home'));
    }

    public function filtrovarAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $variedades = $em->getRepository('SemillaBundle:Variedad')->findByCultivo($request->get('cultivo_id'));

        return $this->render('SemillaBundle:Variedad:filtrovar.html.twig', array(
            'variedades' => $variedades
        ));
    }
}