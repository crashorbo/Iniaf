<?php

namespace Iniaf\Bundle\SemillaBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;

class AddCultivoFieldSubscriber implements EventSubscriberInterface
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

    private function addCultivoForm($form, $cultivo)
    {
        $form->add('cultivo','entity', array(
            'class'         => 'SemillaBundle:Cultivo',
            'mapped'        =>  false,
            'label'         => 'Cultivo',
            'empty_value'   => 'Cultivo',
            'data'          => $cultivo,
            'attr'          => array(
                'class' => 'cultivo_selector form-control',
            ),
            'query_builder' =>  function(EntityRepository $repository){
                    $qb = $repository->createQueryBuilder('cultivo');
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
        $categoria = $accessor->getValue($data, 'categoria');
        $cultivo = ($categoria) ? $categoria->getCultivo(): null ;
        $this->addCultivoForm($form, $cultivo);
    }

    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $cultivo = array_key_exists('cultivo', $data) ? $data['cultivo'] : null;
        $this->addCultivoForm($form, $cultivo);
    }
}