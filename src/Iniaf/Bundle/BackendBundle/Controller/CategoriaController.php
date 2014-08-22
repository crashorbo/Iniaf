<?php

namespace Iniaf\Bundle\BackendBundle\Controller;

use Iniaf\Bundle\SemillaBundle\Entity\Categoria;
use Iniaf\Bundle\SemillaBundle\Form\CategoriaType;
use Iniaf\Bundle\SemillaBundle\Model\CategoriaModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CategoriaController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('SemillaBundle:Categoria')->findAll();

        $entity = new CategoriaModel();
        $form = $this->createForm(new CategoriaType(), $entity);

        return $this->render('BackendBundle:Categoria:index.html.twig', array(
            'entities'      =>  $entities,
            'form'          =>  $form->createView()
        ));
    }

    public function crearAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new CategoriaModel();
        $form = $this->createForm(new CategoriaType(), $entity);

        $form->handleRequest($request);

        $categoria = new Categoria();
        $cultivo = $em->getRepository('SemillaBundle:Cultivo')->findOneById($entity->cultivo);
        $categoria->setCultivo($cultivo);
        $categoria->setNombre($entity->nombre);
        $em->persist($categoria);
        $em->flush();

        return $this->redirect($this->generateUrl('backend_categoria_home'));
    }

    public function filtrocatAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categorias = $em->getRepository('SemillaBundle:Categoria')->findByCultivo($request->get('cultivo_id'));

        return $this->render('BackendBundle:Categoria:filtrocat.html.twig', array(
            'categorias' => $categorias
        ));
    }
}