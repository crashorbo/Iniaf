<?php

namespace Iniaf\Bundle\ExtranetBundle\Controller;

use Iniaf\Bundle\CertificacionBundle\Form\InscripcionType;
use Iniaf\Bundle\CertificacionBundle\Model\InscripcionModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Core\SecurityContext;

class CertificacionController extends Controller
{
    /**
     * @Route("/certificacion", name="extranet_certificacion_home" )
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction()
    {
        $usuario = $this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('SemilleraBundle:Semillera')->findAll();
        $inscripciones = $em->getRepository('CertificacionBundle:Inscripcion')->findAll();
        $entity = new InscripcionModel();
        $form = $this->createForm(new InscripcionType(), $entity);
        return $this->render('ExtranetBundle:Certificacion:index.html.twig', array(
            'form'          =>  $form->createView(),
            'entities'      =>  $entities,
            'inscripciones' =>  $inscripciones,
            'usuario'       =>  $usuario
        ));
    }
}