<?php

namespace Iniaf\Bundle\LocalizacionBundle\EventListener;

use Iniaf\Bundle\LocalizacionBundle\Entity\Municipio;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;

class AddComunidadFieldSubscriber implements EventSubscriberInterface
{
    private $factory;

    public function __construct(FormFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_BIND     => 'preBind'
        );
    }

    private function addComunidadForm($form, $comunidad, $municipio)
    {
        $form->add('comunidad','entity', array(
            'class'         => 'LocalizacionBundle:Comunidad',
            'empty_value'   => 'Comunidad',
            'label'         => 'Comunidad',
            'data'          => $comunidad,
            'attr'          => array(
                'class' => 'municipio_selector form-control',
            ),
            'query_builder' => function (EntityRepository $repository) use ($municipio) {
                    $qb = $repository->createQueryBuilder('comunidad')
                        ->innerJoin('comunidad.municipio', 'municipio');
                    if ($municipio instanceof Municipio) {
                        $qb->where('comunidad.municipio = :municipio')
                            ->setParameter('municipio', $municipio->getId());
                    } elseif (is_numeric($municipio)) {
                        $qb->where('municipio.id = :municipio')
                            ->setParameter('municipio', $municipio);
                    } else {
                        $qb->where('municipio.nombre = :municipio')
                            ->setParameter('municipio', null);
                    }

                    return $qb;
                }
        ));
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }
        $accessor = PropertyAccess::getPropertyAccessor();
        $comunidad = $accessor->getValue($data, 'comunidad');
        $municipio = ($comunidad) ? $comunidad->getMunicipio() : null ;
        $this->addComunidadForm($form, $comunidad, $municipio);
    }

    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $comunidad = array_key_exists('comunidad', $data) ? $data['comunidad'] : null;
        $municipio = array_key_exists('municipio', $data) ? $data['municipio'] : null;
        $this->addComunidadForm($form, $comunidad, $municipio);
    }
}