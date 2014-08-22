<?php

namespace Iniaf\Bundle\BackendBundle\Controller;

use Iniaf\Bundle\SemilleraBundle\Entity\Semillera;
use Iniaf\Bundle\SemilleraBundle\Form\SemilleraType;
use Iniaf\Bundle\SemilleraBundle\Model\SemilleraModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class SemilleraController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('SemilleraBundle:Semillera')->findAll();

        $entity = new SemilleraModel();
        $form = $this->createForm(new SemilleraType(), $entity);


        return $this->render('BackendBundle:Semillera:index.html.twig', array(
            'entities'      =>  $entities,
            'form'          =>  $form->createView()
        ));
    }

    public function crearAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new SemilleraModel();
        $form = $this->createForm(new SemilleraType(), $entity);

        $form->handleRequest($request);
        $validador = $em->getRepository('SemilleraBundle:Semillera')->findByNombre($entity->nombre);
        if($validador == null)
        {
            $semillera = new Semillera();
            $comunidad = $em->getRepository('LocalizacionBundle:Comunidad')->findOneById($entity->comunidad);
            $semillera->setNombre($entity->nombre);
            $semillera->setComunidad($comunidad);
            $semillera->setResponsable($entity->responsable);
            $semillera->setTecnicoResponsable($entity->tecnicoResponsable);
            $semillera->setTipo($entity->tipo);
            $semillera->setDireccion($entity->direccion);
            $semillera->setTelefono($entity->telefono);
            $semillera->setCiNit($entity->ciNit);
            $em->persist($semillera);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('backend_semillera_home'));
    }

    public function filtrovarAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $variedades = $em->getRepository('SemillaBundle:Variedad')->findByCultivo($request->get('cultivo_id'));

        return $this->render('BackendBundle:Variedad:filtrovar.html.twig', array(
            'variedades' => $variedades
        ));
    }

    public function editarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $semillera = $em->getRepository('SemilleraBundle:Semillera')->findOneById($id);
        $entity = new SemilleraModel();
        $entity->nombre = $semillera->getNombre();
        $entity->comunidad = $semillera->getComunidad();
        $entity->responsable = $semillera->getResponsable();
        $entity->tecnicoResponsable = $semillera->getTecnicoResponsable();
        $entity->tipo = $semillera->getTipo();
        $entity->direccion = $semillera->getDireccion();
        $entity->telefono = $semillera->getTelefono();
        $entity->ciNit = $semillera->getCiNit();

        $form = $this->createForm(new SemilleraType(), $entity);

        if ($request->isMethod('post'))
        {
            $form->handleRequest($request);

            $comunidad = $em->getRepository('LocalizacionBundle:Comunidad')->findOneById($entity->comunidad);
            $semillera->setNombre($entity->nombre);
            $semillera->setComunidad($comunidad);
            $semillera->setResponsable($entity->responsable);
            $semillera->setTecnicoResponsable($entity->tecnicoResponsable);
            $semillera->setTipo($entity->tipo);
            $semillera->setDireccion($entity->direccion);
            $semillera->setTelefono($entity->telefono);
            $semillera->setCiNit($entity->ciNit);

            $em->flush();

            return $this->redirect($this->generateUrl('backend_semillera_home'));
        }

        return $this->render('BackendBundle:Semillera:editar.html.twig', array(
            'form'      =>  $form->createView(),
            'entity'    =>  $semillera
        ));
    }
}