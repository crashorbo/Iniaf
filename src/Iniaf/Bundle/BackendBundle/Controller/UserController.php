<?php

namespace Iniaf\Bundle\BackendBundle\Controller;

use Iniaf\Bundle\UserBundle\Entity\Usuario;
use Iniaf\Bundle\UserBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class UserController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UserBundle:Usuario')->findAll();

        return $this->render('BackendBundle:User:index.html.twig',array(
            'entities' => $entities));
    }

    public function crearAction(Request $request)
    {
        $entity = new Usuario();
        $form = $this->createForm(new UserType(), $entity);

        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $entity->setUsername($entity->getCi());
            $entity->setSalt(md5(time()));
            $encoder = $this->get('security.encoder_factory')->getEncoder($entity);
            $passcodificado = $encoder->encodePassword(
                $entity->getUsername(),
                $entity->getSalt()
            );
            $entity->setPassword($passcodificado);

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backend_user_home'));
        }

        return $this->render('BackendBundle:User:crear.html.twig',array(
            'form' => $form->createView()));
    }

    public function editarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('UserBundle:Usuario')->findOneById($id);
        $form = $this->createForm(new UserType(), $entity);

        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $entity->setUsername($entity->getCi());
            $entity->setSalt(md5(time()));
            $encoder = $this->get('security.encoder_factory')->getEncoder($entity);
            $passcodificado = $encoder->encodePassword(
                $entity->getUsername(),
                $entity->getSalt()
            );
            $entity->setPassword($passcodificado);

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl('backend_user_home'));
        }

        return $this->render('BackendBundle:User:editar.html.twig', array(
            'form'      =>  $form->createView(),
            'entity'    =>  $entity
        ));
    }

}
