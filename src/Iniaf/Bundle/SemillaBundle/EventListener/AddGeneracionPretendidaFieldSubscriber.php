<?php

namespace Iniaf\Bundle\SemillaBundle\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use Iniaf\Bundle\SemillaBundle\Entity\Categoria;//provincia
use Iniaf\Bundle\SemillaBundle\Entity\Cultivo;//city

class AddGeneracionPretendidaFieldSubscriber implements EventSubscriberInterface
{
    private $propertyPathToGeneracionPretendida;

    public function __construct($propertyPathToGeneracionPretendida)
    {
        $this->propertyPathToGeneracionPretendida = $propertyPathToGeneracionPretendida;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::POST_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT    => 'preSubmit'
        );
    }

    private function addCityForm($form, $categoria_id)
    {
        $formOptions = array(
            'class'         => 'SemillaBundle:Categoria',
            'empty_value'   => 'GENERACION PRETENDIDA',
            'label'         => 'Generacion Pretendida',
            'attr'          => array(
                'class' => 'form-control',
            ),
            'query_builder' => function (EntityRepository $repository) use ($categoria_id) {
                    $qb = $repository->createQueryBuilder('generacion')
                        ->innerJoin('generacion.categoria', 'categoria')
                        ->where('categoria.id = :categoria')
                        ->setParameter('province', $categoria_id)
                    ;

                    return $qb;
                }
        );

        $form->add($this->propertyPathToGeneracionPretendida, 'entity', $formOptions);
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $accessor    = PropertyAccess::createPropertyAccessor();

        $generacion  = $accessor->getValue($data, $this->propertyPathToGeneracionPretendida);
        $categoria_id = ($generacion) ? $generacion->getCategoria()->getId() : null;

        $this->addCityForm($form, $categoria_id);
    }

    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        $categoria_id = array_key_exists('categoriaPretendida', $data) ? $data['province'] : null;

        $this->addCityForm($form, $categoria_id);
    }
}
