<?php

namespace Iniaf\Bundle\ExtranetBundle\Controller;

use Iniaf\Bundle\CertificacionBundle\Entity\HojaCosecha;
use Iniaf\Bundle\CertificacionBundle\Form\HojaCosechaType;
use Iniaf\Bundle\CertificacionBundle\Model\HojaCosechaModel;
use Iniaf\Bundle\MovimientoBundle\Entity\RegistroTarifa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ps\PdfBundle\Annotation\Pdf;

class HojaCosechaController extends Controller
{
    public function crearAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.context')->getToken()->getUser();

        $entity = new HojaCosechaModel();

        $form = $this->createForm(new HojaCosechaType(), $entity);

        $registro = $em->getRepository('CertificacionBundle:RegistroCampo')->findOneById($id);
        $categorias = $em->getRepository('SemillaBundle:Categoria')->findByCultivo($registro->getVariedad()->getCultivo()->getId());

        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $hojaCosecha = new HojaCosecha();
            $hojaCosecha->setPlantaAcondicionadora($entity->plantaAcondicionadora);
            $hojaCosecha->setSuperficie($entity->superficie);
            $generacion = $em->getRepository('SemillaBundle:Generacion')->findOneById($entity->generacion);
            $hojaCosecha->setGeneracion($generacion);
            $hojaCosecha->setMezclaVarietal($entity->mezclaVarietal);
            $hojaCosecha->setPlantasAnormales($entity->plantasAnormales);
            $hojaCosecha->setRendimientoD($entity->rendimientoD);
            $hojaCosecha->setRendimientoCampo($entity->rendimientoCampo);
            $hojaCosecha->setCupones($entity->cupones);
            $hojaCosecha->setSerieCupones($entity->serieCupones);
            $hojaCosecha->setCampoAprobado($entity->campoAprobado);
            $hojaCosecha->setPersonaEntregado($entity->personaEntregado);
            $hojaCosecha->setDescripcionMezcla($entity->descripcionMezcla);
            $hojaCosecha->setObservaciones($entity->observaciones);
            $hojaCosecha->setRegistroCampo($registro);
            $em->persist($hojaCosecha);
            $em->flush();

            if ($entity->campoAprobado != 'NO')
            {
                $tarifaCer = $em->getRepository('SemillaBundle:Tarifa')->findPorCultivo($registro->getVariedad()->getCultivo(),'CERTIFICACION');
                $regtarifa = new RegistroTarifa();
                $regtarifa->setTarifa($tarifaCer);
                $registro->agregarMonto($tarifaCer->getMonto());
                $regtarifa->setRegistroCampo($registro);
                $em->persist($regtarifa);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('extranet_registro_ver', array(
                'id'    =>  $registro->getId()
            )));
        }
        return $this->render('ExtranetBundle:HojaCosecha:crear.html.twig', array(
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

        $entity = $em->getRepository('CertificacionBundle:HojaCosecha')->findOneById($id);

        return $this->render(sprintf('ExtranetBundle:HojaCosecha:imprimir.%s.twig', $format),array(
            'entity'    =>  $entity
        ));
    }
}
