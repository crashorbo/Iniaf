<?php

namespace Iniaf\Bundle\ExtranetBundle\Controller;

use Iniaf\Bundle\CertificacionBundle\Entity\InspeccionAlmacen;
use Iniaf\Bundle\CertificacionBundle\Form\InspeccionAlmacenType;
use Iniaf\Bundle\CertificacionBundle\Model\InspeccionAlmacenModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ps\PdfBundle\Annotation\Pdf;

class InspeccionAlmacenController extends Controller
{
    public function crearAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.context')->getToken()->getUser();

        $registro = $em->getRepository('CertificacionBundle:RegistroCampo')->findOneById($id);
        $categorias = $em->getRepository('SemillaBundle:Categoria')->findByCultivo($registro->getVariedad()->getCultivo()->getId());
        $entity = new InspeccionAlmacenModel();
        $entity->n1 = 0;
        $entity->n2 = 0;
        $entity->n3 = 0;
        $entity->n4 = 0;
        $entity->n5 = 0;
        $entity->n6 = 0;
        $entity->t1 = 0;
        $entity->t2 = 0;
        $entity->t3 = 0;
        $entity->t4 = 0;
        $entity->t5 = 0;
        $form = $this->createForm(new InspeccionAlmacenType(), $entity);
        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $inspeccionAlmacen = new InspeccionAlmacen();
            $inspeccionAlmacen->setFechaInspeccion(new \DateTime($entity->fechaInspeccion));
            $inspeccionAlmacen->setNumeroLote($entity->numeroLote);
            $inspeccionAlmacen->setAprobado($entity->aprobado);
            $generacion = $em->getRepository('SemillaBundle:Generacion')->findOneById($entity->generacion);
            $inspeccionAlmacen->setGeneracion($generacion);
            $inspeccionAlmacen->setT1($entity->t1);
            $inspeccionAlmacen->setT2($entity->t2);
            $inspeccionAlmacen->setT3($entity->t3);
            $inspeccionAlmacen->setT4($entity->t4);
            $inspeccionAlmacen->setT5($entity->t5);
            $inspeccionAlmacen->setPesoBolsa($entity->pesoBolsa);
            $inspeccionAlmacen->setTotalBolsas($entity->totalBolsas);
            $inspeccionAlmacen->setPuntajeMaximo($entity->puntajeMaximo);
            $inspeccionAlmacen->setN1($entity->n1);
            $inspeccionAlmacen->setN2($entity->n2);
            $inspeccionAlmacen->setN3($entity->n3);
            $inspeccionAlmacen->setN4($entity->n4);
            $inspeccionAlmacen->setN5($entity->n5);
            $inspeccionAlmacen->setN6($entity->n6);
            $inspeccionAlmacen->setObservaciones($entity->observaciones);
            $inspeccionAlmacen->setRegistroCampo($registro);
            $em->persist($inspeccionAlmacen);
            $em->flush();
            return $this->redirect($this->generateUrl('extranet_registro_ver', array(
                'id'    =>  $registro->getId()
            )));
        }

        return $this->render('ExtranetBundle:InspeccionAlmacen:crear.html.twig', array(
            'registro'  =>  $registro,
            'form'      =>  $form->createView(),
            'usuario'   =>  $usuario,
            'categorias'=>  $categorias
        ));
    }

    /**
     * @Pdf()
     */
    public function imprimirAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $format = $this->get('request')->get('_format');

        $entity = $em->getRepository('CertificacionBundle:InspeccionAlmacen')->findOneById($id);

        return $this->render(sprintf('ExtranetBundle:InspeccionAlmacen:imprimir.%s.twig', $format),array(
            'entity'    =>  $entity
        ));
    }
}
