<?php

namespace Iniaf\Bundle\SemillaBundle\EventListener;

use Iniaf\Bundle\SemillaBundle\Entity\Categoria;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;

class AddGeneracionFieldSubscriber implements EventSubscriberInterface
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

    private function addCategoriaForm($form, $generacion, $categoria)
    {
        $form->add('categoria','entity', array(
            'class'         => 'SemillaBundle:Categoria',
            'empty_value'   => 'Generacion',
            'label'         => 'generacion',
            'data'          => $generacion,
            'attr'          => array(
                'class' => 'categoria_selector form-control',
            ),
            'query_builder' => function (EntityRepository $repository) use ($categoria) {
                    $qb = $repository->createQueryBuilder('generacion')
                        ->innerJoin('generacion.categoria', 'categoria');
                    if ($categoria instanceof Categoria) {
                        $qb->where('generacion.categoria = :categoria')
                            ->setParameter('categoria', $categoria->getId());
                    } elseif (is_numeric($categoria)) {
                        $qb->where('categoria.id = :categoria')
                            ->setParameter('categoria', $categoria);
                    } else {
                        $qb->where('categoria.nombre = :categoria')
                            ->setParameter('categoria', null);
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
        $generacion = $accessor->getValue($data, 'categoria');
        $categoria = ($generacion) ? $generacion->getCultivo() : null ;
        $this->addCategoriaForm($form, $generacion, $categoria);
    }

    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $generacion = array_key_exists('generacion', $data) ? $data['generacion'] : null;
        $categoria = array_key_exists('categoria', $data) ? $data['categoria'] : null;
        $this->addCategoriaForm($form, $generacion, $categoria);
    }
}