<?php

namespace Iniaf\Bundle\ExtranetBundle\Controller;

use Iniaf\Bundle\SemillaBundle\Entity\Tarifa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class TarifaController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.context')->getToken()->getUser();
        $cultivos = $em->getRepository('SemillaBundle:Cultivo')->findAll();

        return $this->render('ExtranetBundle:Tarifa:index.html.twig',array(
            'usuario'   =>  $usuario,
            'cultivos'  =>  $cultivos
        ));
    }

    public function modificarAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $tarifa = $em->getRepository('SemillaBundle:Tarifa')->findOneById($request->get('_tarifa'));
        $tarifaMod = new Tarifa($tarifa->getTipo());
        $tarifaMod->setCultivo($tarifa->getCultivo());
        $tarifaMod->setMonto($request->get('_monto'));
        $tarifa->setEstado('DESACTIVADO');
        $em->persist($tarifa);
        $em->persist($tarifaMod);
        $em->flush();

        return $this->redirect($this->generateUrl('extranet_tarifa_home'));
    }

    public function buscarAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $tarifas = $em->getRepository('SemillaBundle:Tarifa')->findPorCultivos($request->get('cultivo_id'));

        return $this->render('ExtranetBundle:Tarifa:tarifas.html.twig', array(
            'tarifas'   =>  $tarifas
        ));
    }
}
