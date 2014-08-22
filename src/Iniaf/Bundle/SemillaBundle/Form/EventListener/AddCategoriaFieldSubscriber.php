<?php

namespace Iniaf\Bundle\SemillaBundle\Form\EventListener;

use Iniaf\Bundle\SemillaBundle\Entity\Cultivo;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;

class AddCategoriaFieldSubscriber implements EventSubscriberInterface
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

    private function addCategoriaForm($form, $categoria, $cultivo)
    {
        $form->add('categoria','entity', array(
            'class'         => 'SemillaBundle:Categoria',
            'empty_value'   => 'Categoria',
            'label'         => 'categoria',
            'data'          => $categoria,
            'attr'          => array(
                'class' => 'categoria_selector form-control',
            ),
            'query_builder' => function (EntityRepository $repository) use ($cultivo) {
                    $qb = $repository->createQueryBuilder('categoria')
                        ->innerJoin('categoria.cultivo', 'cultivo');
                    if ($cultivo instanceof Cultivo) {
                        $qb->where('categoria.cultivo = :cultivo')
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
        $categoria = $accessor->getValue($data, 'categoria');
        $cultivo = ($categoria) ? $categoria->getCultivo() : null ;
        $this->addCategoriaForm($form, $categoria, $cultivo);
    }

    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $cultivo = array_key_exists('cultivo', $data) ? $data['cultivo'] : null;
        $categoria = array_key_exists('categoria', $data) ? $data['categoria'] : null;
        $this->addCategoriaForm($form, $categoria, $cultivo);
    }
}