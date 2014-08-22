<?php

namespace Iniaf\Bundle\LocalizacionBundle\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;

class AddDepartamentoFieldSubscriber implements EventSubscriberInterface
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

    private function addDepartamentoForm($form, $departamento)
    {
        $form->add('departamento','entity', array(
            'class'         => 'LocalizacionBundle:Departamento',
            'mapped'        =>  false,
            'label'         => 'Departamento',
            'empty_value'   => 'Departamento',
            'data'          => $departamento,
            'attr'          => array(
                'class' => 'departamento_selector form-control',
            ),
            'query_builder' =>  function(EntityRepository $repository){
                    $qb = $repository->createQueryBuilder('departamento');
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
        $departamento = ($comunidad) ? $comunidad->getMunicipio()->getProvincia()->getDepartamento() : null ;
        $this->addDepartamentoForm($form, $departamento);
    }

    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $departamento = array_key_exists('departamento', $data) ? $data['departamento'] : null;
        $this->addDepartamentoForm($form, $departamento);
    }
}