<?php

namespace Iniaf\Bundle\SemillaBundle\EventListener;

use Iniaf\Bundle\SemillaBundle\Entity\Cultivo;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;

class AddVariedadFieldSubscriber implements EventSubscriberInterface
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

    private function addVariedadForm($form, $variedad, $cultivo)
    {
        $form->add('variedad','entity', array(
            'class'         => 'SemillaBundle:Variedad',
            'empty_value'   => 'Variedad',
            'label'         => 'Variedad',
            'data'          => $variedad,
            'attr'          => array(
                'class' => 'categoria_selector form-control',
            ),
            'query_builder' => function (EntityRepository $repository) use ($cultivo) {
                    $qb = $repository->createQueryBuilder('variedad')
                        ->innerJoin('variedad.cultivo', 'cultivo');
                    if ($cultivo instanceof Cultivo) {
                        $qb->where('variedad.cultivo = :cultivo')
                            ->setParameter('cultivo', $cultivo->getId());
                    } elseif (is_numeric($cultivo)) {
                        $qb->where('cultivo.id = :cultivo')
                            ->setParameter('cultivo', $cultivo);
                    } else {
                        $qb->where('cultivo.nombre = :cultivo')
                            ->setParameter('cultivo', null);
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
        $variedad = $accessor->getValue($data, 'variedad');
        $cultivo = ($variedad) ? $variedad->getCultivo() : null ;
        $this->addVariedadForm($form, $variedad, $cultivo);
    }

    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $cultivo = array_key_exists('cultivo', $data) ? $data['cultivo'] : null;
        $variedad = array_key_exists('variedad', $data) ? $data['variedad'] : null;
        $this->addVariedadForm($form, $variedad, $cultivo);
    }
}