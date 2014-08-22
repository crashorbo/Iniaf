<?php

namespace Iniaf\Bundle\ExtranetBundle\Controller;

use Iniaf\Bundle\UserBundle\Form\PasswordType;
use Iniaf\Bundle\UserBundle\Form\UserType;
use Iniaf\Bundle\UserBundle\Model\PasswordModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;


class PerfilController extends Controller
{

    public function perfilAction(Request $request)
    {
        $usuario = $this->get('security.context')->getToken()->getUser();

        $entity = new PasswordModel();

        $form = $this->createForm(new UserType(), $usuario);

        $form1 = $this->createForm(new PasswordType(), $entity);

        if ($request->isMethod('POST'))
        {
            $em = $this->getDoctrine()->getManager();

            $form->handleRequest($request);

            $em->flush();

            return  $this->redirect($this->generateUrl('extranet_home'));

        }
        return $this->render('ExtranetBundle:Perfil:perfil.html.twig', array(
            'usuario'   =>  $usuario,
            'form'      =>  $form->createView(),
            'form1'     =>  $form1->createView()
        ));
    }

    public function cambiarAction(Request $request)
    {
        $user = $this->get('security.context')->getToken()->getUser();

        $entity = new PasswordModel();
        $form = $this->createForm(new PasswordType(), $entity);

        if ($request->isMethod('POST'))
        {
            $em = $this->getDoctrine()->getManager();

            $form->handleRequest($request);
            $usuario = $em->getRepository('UserBundle:Usuario')->findOneById($user->getId());
            $usuario->setSalt(md5(time()));
            $encoder = $this->get('security.encoder_factory')->getEncoder($usuario);
            $passcodificado = $encoder->encodePassword(
                $entity->password,
                $usuario->getSalt()
            );
            $usuario->setPassword($passcodificado);

            $em->flush();

            return $this->redirect($this->generateUrl('extranet_home'));
        }
    }
}
