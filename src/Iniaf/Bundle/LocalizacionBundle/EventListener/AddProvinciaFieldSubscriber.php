<?php

namespace Iniaf\Bundle\LocalizacionBundle\EventListener;

use Iniaf\Bundle\LocalizacionBundle\Entity\Departamento;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;

class AddProvinciaFieldSubscriber implements EventSubscriberInterface
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

    private function addProvinciaForm($form, $provincia, $departamento)
    {
        $form->add('provincia','entity', array(
            'class'         => 'LocalizacionBundle:Provincia',
            'empty_value'   => 'Provincia',
            'label'         => 'Provincia',
            'mapped'        => false,
            'data'          => $provincia,
            'attr'          => array(
                'class' => 'provincia_selector form-control',
            ),
            'query_builder' => function (EntityRepository $repository) use ($departamento) {
                    $qb = $repository->createQueryBuilder('provincia')
                        ->innerJoin('provincia.departamento', 'departamento');
                    if ($departamento instanceof Departamento) {
                        $qb->where('provincia.departamento = :departamento')
                            ->setParameter('departamento', $departamento);
                    } elseif (is_numeric($departamento)) {
                        $qb->where('departamento.id = :departamento')
                            ->setParameter('departamento', $departamento);
                    } else {
                        $qb->where('departamento.nombre = :departamento')
                            ->setParameter('departamento', null);
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
        $provincia = ($comunidad) ? $comunidad->getMunicipio()->getProvincia() : null ;
        $departamento = ($provincia) ? $provincia->getDepartamento() : null ;
        $this->addProvinciaForm($form, $provincia, $departamento);
    }

    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $provincia = array_key_exists('provincia', $data) ? $data['provincia'] : null;
        $departamento = array_key_exists('departamento', $data) ? $data['departamento'] : null;
        $this->addProvinciaForm($form, $provincia, $departamento);
    }
}