<?php

namespace Iniaf\Bundle\BackendBundle\Controller;

use Iniaf\Bundle\LocalizacionBundle\Entity\Comunidad;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Iniaf\Bundle\LocalizacionBundle\Model\LocalizacionModel;
use Iniaf\Bundle\LocalizacionBundle\Form\LocalizacionType;

class LocalizacionController extends Controller
{
    public function indexAction()
    {
        $entity = new LocalizacionModel();
        $form = $this->createForm(new LocalizacionType(), $entity);
        $em = $this->getDoctrine()->getManager();
        $comunidades = $em->getRepository('LocalizacionBundle:Comunidad')->findAll();
        return $this->render('BackendBundle:Localizacion:index.html.twig',array(
            'form'          =>  $form->createView(),
            'comunidades'   =>  $comunidades
        ));
    }

    public function provinciasAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $provincias = $em->getRepository('LocalizacionBundle:Provincia')->findByDepartamento($request->get('departamento_id'));

        return $this->render('BackendBundle:Localizacion:provincias.html.twig', array(
            'provincias'    =>  $provincias
        ));
    }

    public function municipiosAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $municipios = $em->getRepository('LocalizacionBundle:Municipio')->findByProvincia($request->get('provincia_id'));

        return $this->render('BackendBundle:Localizacion:municipios.html.twig', array(
            'municipios'    =>  $municipios
        ));
    }

    public function comunidadesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $comunidades = $em->getRepository('LocalizacionBundle:Comunidad')->findByMunicipio($request->get('municipio_id'));

        return $this->render('BackendBundle:Localizacion:comunidades.html.twig', array(
            'comunidades'    =>  $comunidades
        ));
    }
    public function crearAction(Request $request)
    {
        $entity = new LocalizacionModel();
        $form = $this->createForm(new LocalizacionType(), $entity);
        $em = $this->getDoctrine()->getManager();

        $form->handleRequest($request);

        $comunidad = new Comunidad();
        $comunidad->setNombre($entity->comunidad);
        $municipio = $em->getRepository('LocalizacionBundle:Municipio')->findOneById($entity->municipio);
        $validador = $em->getRepository('LocalizacionBundle:Comunidad')->findByValidar($municipio, $entity->comunidad );
        if ($validador == null)
        {
            $comunidad->setMunicipio($municipio);
            $em->persist($comunidad);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('backend_localizacion_home'));
    }

    public function filtrodepAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $provincias = $em->getRepository('LocalizacionBundle:Provincia')->findByDepartamento($request->get('departamento_id'));

        return $this->render('BackendBundle:Localizacion:filtrodep.html.twig', array(
            'provincias' => $provincias
        ));
    }

    public function filtroproAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $municipios = $em->getRepository('LocalizacionBundle:Municipio')->findByProvincia($request->get('provincia_id'));

        return $this->render('BackendBundle:Localizacion:filtropro.html.twig', array(
            'municipios' => $municipios
        ));
    }
    public function filtrocomAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $comunidades = $em->getRepository('LocalizacionBundle:Comunidad')->findByMunicipio($request->get('municipio_id'));

        return $this->render('BackendBundle:Localizacion:filtromun.html.twig', array(
            'comunidades' => $comunidades
        ));
    }
}