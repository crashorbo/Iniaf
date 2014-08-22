<?php

namespace Iniaf\Bundle\ExtranetBundle\Controller;

use Iniaf\Bundle\CooperadorBundle\Entity\Afiliacion;
use Iniaf\Bundle\CooperadorBundle\Entity\Cooperador;
use Iniaf\Bundle\CooperadorBundle\Form\CooperadorType;
use Iniaf\Bundle\CooperadorBundle\Model\CooperadorModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ps\PdfBundle\Annotation\Pdf;
use Symfony\Component\Security\Core\SecurityContext;

class SemilleraController extends Controller
{

    public function indexAction()
    {
        $usuario = $this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('SemilleraBundle:Semillera')->findAll();
        return $this->render('ExtranetBundle:Semillera:index.html.twig', array(
            'entities'      => $entities,
            'usuario'       =>  $usuario
        ));
    }

    public function verAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.context')->getToken()->getUser();
        $entity = $em->getRepository('SemilleraBundle:Semillera')->findOneById($id);

        $cooperador = new CooperadorModel();
        $form = $this->createForm(new CooperadorType(), $cooperador);

        return $this->render('ExtranetBundle:Semillera:ver.html.twig', array(
            'entity'    =>  $entity,
            'form'      =>  $form->createView(),
            'usuario'   =>  $usuario
        ));
    }

    public  function crearAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $coop = new CooperadorModel();
        $form = $this->createForm(new CooperadorType(), $coop);

        $form->handleRequest($request);

        $cooperador = new Cooperador();

        $cooperador->setNombre($coop->nombre);
        $cooperador->setCiNit($coop->ciNit);
        $cooperador->setTelefono($coop->telefono);
        $cooperador->setCelular($coop->celular);
        $cooperador->setDireccion($coop->direccion);

        $buscar = $em->getRepository('CooperadorBundle:Cooperador')->findOneByCiNit($coop->ciNit);
        if ($buscar != null)
        {
            $em->persist($cooperador);
            $afiliacion = new Afiliacion();
            $semillera = $em->getRepository('SemilleraBundle:Semillera')->findOneById($id);
            $afiliacion->setSemillera($semillera);
            $afiliacion->setCooperador($cooperador);

            $em->persist($afiliacion);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('extranet_semillera_ver', array('id'=>$id)));
    }

    public function eliminarAction($id_afiliado, $id_semillera)
    {
        $em = $this->getDoctrine()->getManager();

        $afiliado = $em->getRepository('CooperadorBundle:Afiliacion')->findOneById($id_afiliado);

        $em->remove($afiliado);
        $em->flush();
        return $this->redirect($this->generateUrl('extranet_semillera_ver', array('id' => $id_semillera)));
    }

    /**
     * @Pdf()
     */
    public function imprimirAction($semillera_id)
    {
        $em = $this->getDoctrine()->getManager();

        $format = $this->get('request')->get('_format');

        $entity = $em->getRepository('SemilleraBundle:Semillera')->findOneById($semillera_id);

        return $this->render(sprintf('ExtranetBundle:Semillera:imprimir.%s.twig', $format),array(
            'entity'    =>  $entity
        ));
    }
}
