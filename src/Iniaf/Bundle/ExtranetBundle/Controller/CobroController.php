<?php

namespace Iniaf\Bundle\ExtranetBundle\Controller;

use Iniaf\Bundle\MovimientoBundle\Entity\Movimiento;
use Iniaf\Bundle\MovimientoBundle\Form\MovimientoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ps\PdfBundle\Annotation\Pdf;

class CobroController extends Controller
{
    public function indexAction($mensaje = null)
    {
        $usuario = $this->get('security.context')->getToken()->getUser();
        return $this->render('ExtranetBundle:Cobro:index.html.twig', array(
            'usuario'   =>  $usuario,
            'mensaje'   =>  $mensaje
        ));
    }

    public function busquedaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.context')->getToken()->getUser();

        $cooperador = $em->getRepository('CooperadorBundle:Cooperador')->findOneByCiNit($request->get('_nrodoc'));

        if ($cooperador != null)
        {
            $registros = $em->getRepository('CertificacionBundle:RegistroCampo')->findByCooperador($cooperador->getId());

            if ($registros != null)
            {
                return $this->render('ExtranetBundle:Cobro:busqueda.html.twig', array(
                    'registros' =>  $registros,
                    'usuario'   =>  $usuario,
                    'cooperador'=>  $cooperador
                ));
            }
            return $this->redirect($this->generateUrl('extranet_cobro_home'));
        }

        return $this->redirect($this->generateUrl('extranet_cobro_home'));
    }

    public function pagoAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $usuario = $this->get('security.context')->getToken()->getUser();
        $registro = $em->getRepository('CertificacionBundle:RegistroCampo')->findOneById($id);

        $movimiento = new Movimiento();
        $form = $this->createForm(new MovimientoType(), $movimiento);

        if  ($request->isMethod('POST'))
        {
            $form->handleRequest($request);

            $movimiento->setRegistroCampo($registro);
            $registro->descontarMonto($movimiento->getMonto());
            $em->persist($movimiento);
            $em->flush();
        }
        return $this->render('ExtranetBundle:Cobro:pago.html.twig', array(
            'registro'  =>  $registro,
            'usuario'   =>  $usuario,
            'form'      =>  $form->createView()
        ));
    }

    /**
     * @Pdf()
     */
    public function imprimirAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MovimientoBundle:Movimiento')->findOneById($id);

        $format = $this->get('request')->get('_format');

        return $this->render(sprintf('ExtranetBundle:Cobro:imprimir.%s.twig', $format),array(
            'entity'     =>  $entity,
        ));
    }

    /**
     * @Pdf()
     */
    public function deudaAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $registros = $em->getRepository('CertificacionBundle:RegistroCampo')->findByCooperador($id);
        $cooperador = $em->getRepository('CooperadorBundle:Cooperador')->findOneById($id);
        $format = $this->get('request')->get('_format');

        return $this->render(sprintf('ExtranetBundle:Cobro:deuda.%s.twig', $format),array(
            'registros'     =>  $registros,
            'cooperador'   =>  $cooperador
        ));
    }
}
