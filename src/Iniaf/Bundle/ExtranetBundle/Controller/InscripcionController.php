<?php

namespace Iniaf\Bundle\ExtranetBundle\Controller;

use Iniaf\Bundle\CertificacionBundle\Entity\Inscripcion;
use Iniaf\Bundle\CertificacionBundle\Form\InscripcionType;
use Iniaf\Bundle\CertificacionBundle\Model\InscripcionModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Core\SecurityContext;

class InscripcionController extends Controller
{
    public function crearAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.context')->getToken()->getUser();

        $entity = new InscripcionModel();
        $form = $this->createForm(new InscripcionType(), $entity);

        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);

            $semillera = $em->getRepository('SemilleraBundle:Semillera')->findOneByNombre($entity->semillera);
            $inscripcion = new Inscripcion();
            $inscripcion->setSemillera($semillera);
            $inscripcion->setCampana($entity->campana);

            $em->persist($inscripcion);
            $em->flush();

            return $this->redirect($this->generateUrl('extranet_inscripcion_ver', array('id' => $inscripcion->getId())));
        }
        return $this->redirect($this->generateUrl('extranet_certificacion_home'));
    }

    public function verAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.context')->getToken()->getUser();

        $entity = $em->getRepository('CertificacionBundle:Inscripcion')->findOneById($id);
        $registros = $em->getRepository('CertificacionBundle:RegistroCampo')->findByInscripcion($entity->getId());

        return $this->render('ExtranetBundle:Inscripcion:ver.html.twig', array(
            'entity'        =>  $entity,
            'usuario'       =>  $usuario,
            'registros'     =>  $registros
        ));
    }
}