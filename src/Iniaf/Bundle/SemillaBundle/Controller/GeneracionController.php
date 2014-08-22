<?php

namespace Iniaf\Bundle\SemillaBundle\Controller;


use Iniaf\Bundle\SemillaBundle\Entity\Generacion;
use Iniaf\Bundle\SemillaBundle\Form\GeneracionType;
use Iniaf\Bundle\SemillaBundle\Model\GeneracionModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class GeneracionController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('SemillaBundle:Generacion')->findAll();

        $entity = new GeneracionModel();
        $form = $this->createForm(new GeneracionType(), $entity);

        return $this->render('SemillaBundle:Generacion:index.html.twig', array(
            'entities'      =>  $entities,
            'form'          =>  $form->createView()
        ));
    }

    public function crearAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new GeneracionModel();
        $form = $this->createForm(new GeneracionType(), $entity);

        $form->handleRequest($request);
        $test = array('id' => $entity->categoria, 'nombre' => $entity->nombre);
        $generacion = new Generacion();
        $categoria = $em->getRepository('SemillaBundle:Categoria')->findOneById($entity->categoria);
        if($categoria != null)
        {
            $generacion->setCategoria($categoria);
            $generacion->setNombre($entity->nombre);
            $em->persist($generacion);
            $em->flush();
            return $this->redirect($this->generateUrl('semilla_generacion_home'));
        }
        return $this->render('SemillaBundle:Generacion:test.html.twig', array(
            'test'    => $test
        ));
    }

    public function gencatAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $categorias = $em->getRepository('SemillaBundle:Categoria')->findByCultivo($request->get('cultivo_id'));

        return $this->render('SemillaBundle:Generacion:categorias.html.twig', array(
            'categorias'    =>  $categorias
        ));
    }

    public function filtrocatAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categorias = $em->getRepository('SemillaBundle:Categoria')->findByCultivo($request->get('cultivo_id'));

        return $this->render('SemillaBundle:Categoria:filtrocat.html.twig', array(
            'categorias' => $categorias
        ));
    }

    public function filtrogencatAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categorias = $em->getRepository('SemillaBundle:Categoria')->findByCultivo($request->get('cultivo_id'));

        return $this->render('SemillaBundle:Generacion:filtrogencat.html.twig', array(
            'categorias' => $categorias
        ));
    }

    public function filtrogengenAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $generaciones = $em->getRepository('SemillaBundle:Generacion')->findByCategoria($request->get('categoria_id'));

        return $this->render('SemillaBundle:Generacion:filtrogengen.html.twig', array(
            'generaciones' => $generaciones
        ));
    }

}