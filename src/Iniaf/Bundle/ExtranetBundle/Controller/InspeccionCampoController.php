<?php

namespace Iniaf\Bundle\ExtranetBundle\Controller;

use Iniaf\Bundle\CertificacionBundle\Entity\HojaInspeccion;
use Iniaf\Bundle\CertificacionBundle\Form\HojaInspeccionType;
use Iniaf\Bundle\CertificacionBundle\Model\InspeccionModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ps\PdfBundle\Annotation\Pdf;

class InspeccionCampoController extends Controller
{
    public function crearAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.context')->getToken()->getUser();

        $registro = $em->getRepository('CertificacionBundle:RegistroCampo')->findOneById($id);
        $categorias = $em->getRepository('SemillaBundle:Categoria')->findByCultivo($registro->getVariedad()->getCultivo()->getId());
        $entity = new InspeccionModel();
        $entity->poblacionHectarea = $registro->getPoblacion();
        $entity->cultivoAnterior = $registro->getCultivoAnterior();
        $entity->fechaSiembra = $registro->getFechaSiembra()->format('d/m/Y');
        $entity->fechaFloracion = $registro->getFechaFloracion()->format('d/m/Y');
        $entity->fechaCosecha = $registro->getFechaCosecha()->format('d/m/Y');
        $form = $this->createForm(new HojaInspeccionType(), $entity);

        if  ($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $inspeccion = new HojaInspeccion();
            $inspeccion->setFechaInspeccion(new \DateTime($entity->fechaInspeccion));
            $inspeccion->setNumeroInspeccion($entity->numeroInspeccion);
            $inspeccion->setNombreLugar($entity->nombreLugar);
            $inspeccion->setSuperficie($entity->superficie);
            $inspeccion->setPoblacionHectarea($entity->poblacionHectarea);
            $inspeccion->setControlMaleza($entity->controlMaleza);
            $inspeccion->setControlInsectos($entity->controlInsectos);
            $inspeccion->setControlEnfermedades($entity->controlEnfermedades);
            $inspeccion->setEstadoGeneral($entity->estadoGeneral);
            $inspeccion->setMezclaVarietal($entity->mezclaVarietal);
            $inspeccion->setMvpi($entity->mvpi);
            $inspeccion->setPapi($entity->papi);
            $inspeccion->setCumpleNorma($entity->cumpleNorma);
            $inspeccion->setAislamiento($entity->aislamiento);
            $generacionUtilizada = $em->getRepository('SemillaBundle:Generacion')->findOneById($entity->generacionUtilizada);
            $generacionPretendida = $em->getRepository('SemillaBundle:Generacion')->findOneById($entity->generacionPretendida);
            $inspeccion->setGeneracionPretendida($generacionUtilizada);
            $inspeccion->setGeneracionUtilizada($generacionPretendida);
            $inspeccion->setPersonaIndicaciones($entity->personaIndicaciones);
            $inspeccion->setObservaciones($entity->observaciones);
            $inspeccion->setRegistroCampo($registro);
            $em->persist($inspeccion);
            $em->flush();
            return $this->redirect($this->generateUrl('extranet_registro_ver', array(
                'id'    =>  $registro->getId()
            )));
        }

        return $this->render('ExtranetBundle:InspeccionCampo:crear.html.twig', array(
            'form'      =>  $form->createView(),
            'registro'  =>  $registro,
            'usuario'   =>  $usuario,
            'categorias'=>  $categorias,
        ));
    }

    /**
     * @Pdf()
     */
    public function imprimirAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $format = $this->get('request')->get('_format');

        $entity = $em->getRepository('CertificacionBundle:HojaInspeccion')->findOneById($id);

        return $this->render(sprintf('ExtranetBundle:InspeccionCampo:imprimir.%s.twig', $format),array(
            'entity'    =>  $entity
        ));
    }
}
