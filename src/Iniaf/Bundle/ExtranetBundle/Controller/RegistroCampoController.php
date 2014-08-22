<?php

namespace Iniaf\Bundle\ExtranetBundle\Controller;

use Iniaf\Bundle\CertificacionBundle\Entity\RegistroCampo;
use Iniaf\Bundle\CertificacionBundle\Form\RegistroType;
use Iniaf\Bundle\CertificacionBundle\Model\RegistroModel;
use Iniaf\Bundle\MovimientoBundle\Entity\RegistroTarifa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Security\Core\SecurityContext;
use Ps\PdfBundle\Annotation\Pdf;

class RegistroCampoController extends Controller
{
    public function crearAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.context')->getToken()->getUser();
        $entity = new RegistroModel();
        $form = $this->createForm(new RegistroType(), $entity);

        $inscripcion = $em->getRepository('CertificacionBundle:Inscripcion')->findOneById($id);
        $afiliaciones = $em->getRepository('CooperadorBundle:Afiliacion')->findBySemillera($inscripcion->getSemillera());
        $cultivos = $em->getRepository('SemillaBundle:Cultivo')->findAll();
        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);

            $registro = new RegistroCampo();
            $cooperador = $em->getRepository('CooperadorBundle:Cooperador')->findOneById($entity->cooperador);
            $registro->setCooperador($cooperador);
            $registro->setTecnico($usuario);
            $registro->setInscripcion($inscripcion);
            $variedad = $em->getRepository('SemillaBundle:Variedad')->findOneById($entity->variedad);
            $registro->setVariedad($variedad);
            $registro->setNroCampo($entity->nroCampo);
            $registro->setSuperficie($entity->superficie);
            $generacion = $em->getRepository('SemillaBundle:Generacion')->findOneById($entity->generacion);
            $registro->setGeneracion($generacion);
            $registro->setFechaSiembra(new \DateTime($entity->fechaSiembra));
            $registro->setCultivoAnterior($entity->cultivoAnterior);
            $registro->setAislamiento($entity->aislamiento);
            $registro->setFechaFloracion(new \DateTime($entity->fechaFloracion));
            $registro->setFechaCosecha(new \DateTime($entity->fechaCosecha));
            $registro->setPlantasMetro($entity->plantasMetro);
            $registro->setDistanciaSurco($entity->distanciaSurco);
            $registro->setPoblacion($entity->poblacion);
            $generacionPretendida = $em->getRepository('SemillaBundle:Generacion')->findOneById($entity->generacionPretendida);
            $registro->setGeneracionPretendida($generacionPretendida);
            $em->persist($registro);
            $em->flush();
            $tarifaIns = $em->getRepository('SemillaBundle:Tarifa')->findPorCultivo($variedad->getCultivo(),'INSCRIPCION');
            $regtarifa = new RegistroTarifa();
            $regtarifa->setTarifa($tarifaIns);
            $registro->agregarMonto($tarifaIns->getMonto());
            $regtarifa->setRegistroCampo($registro);
            $em->persist($regtarifa);
            $em->flush();

            return $this->redirect($this->generateUrl('extranet_registro_ver', array('id' => $registro->getId())));
        }
        return $this->render('ExtranetBundle:RegistroCampo:crear.html.twig', array(
            'form'  =>  $form->createView(),
            'inscripcion'   =>  $inscripcion,
            'afiliaciones'  =>  $afiliaciones,
            'usuario'       =>  $usuario,
            'cultivos'      =>  $cultivos
        ));
    }

    public function verAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $usuario = $this->get('security.context')->getToken()->getUser();
        $registro = $em->getRepository('CertificacionBundle:RegistroCampo')->findOneById($id);

        return $this->render('ExtranetBundle:RegistroCampo:ver.html.twig', array(
            'usuario'   =>  $usuario,
            'registro'  =>  $registro
        ));
    }

    /**
     * @Pdf()
     */
    public function imprimirAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $format = $this->get('request')->get('_format');

        $entity = $em->getRepository('CertificacionBundle:RegistroCampo')->findOneById($id);

        return $this->render(sprintf('ExtranetBundle:RegistroCampo:imprimir.%s.twig', $format),array(
            'entity'    =>  $entity
        ));
    }

    public function categoriasAction(Request $request)
    {
        $cultivo = $request->get('cultivo_id');

        $em = $this->getDoctrine()->getManager();

        $categorias = $em->getRepository('SemillaBundle:Categoria')->findByCultivo($cultivo);

        return $this->render('ExtranetBundle:RegistroCampo:categorias.html.twig', array(
            'categorias' => $categorias
        ));
    }

    public function variedadesAction(Request $request)
    {
        $cultivo = $request->get('cultivo_id');

        $em = $this->getDoctrine()->getManager();

        $variedades = $em->getRepository('SemillaBundle:Variedad')->findByCultivo($cultivo);

        return $this->render('ExtranetBundle:RegistroCampo:variedades.html.twig', array(
            'variedades' => $variedades
        ));
    }

    public function generacionesAction(Request $request)
    {
        $categoria = $request->get('categoria_id');

        $em = $this->getDoctrine()->getManager();

        $generaciones = $em->getRepository('SemillaBundle:Generacion')->findByCategoria($categoria);

        return $this->render('ExtranetBundle:RegistroCampo:generaciones.html.twig',array(
            'generaciones' => $generaciones
        ));
    }
}