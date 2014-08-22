<?php

namespace Iniaf\Bundle\LocalizacionBundle\Form\EventListener;

use Iniaf\Bundle\LocalizacionBundle\Entity\Provincia;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;

class AddMunicipioFieldSubscriber implements EventSubscriberInterface
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

    private function addMunicipioForm($form, $municipio, $provincia)
    {
        $form->add('municipio','entity', array(
            'class'         => 'LocalizacionBundle:Municipio',
            'empty_value'   => 'Municipio',
            'label'         => 'Municipio',
            'data'          => $municipio,
            'attr'          => array(
                'class' => 'municipio_selector form-control',
            ),
            'query_builder' => function (EntityRepository $repository) use ($provincia) {
                    $qb = $repository->createQueryBuilder('municipio')
                        ->innerJoin('municipio.provincia', 'provincia');
                    if ($provincia instanceof Provincia) {
                        $qb->where('municipio.provincia = :provincia')
                            ->setParameter('provincia', $provincia->getId());
                    } elseif (is_numeric($provincia)) {
                        $qb->where('provincia.id = :provincia')
                            ->setParameter('provincia', $provincia);
                    } else {
                        $qb->where('provincia.nombre = :provincia')
                            ->setParameter('provincia', null);
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
        $municipio = $accessor->getValue($data, 'municipio');
        $provincia = ($municipio) ? $municipio->getProvincia() : null ;
        $this->addMunicipioForm($form, $municipio, $provincia);
    }

    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $provincia = array_key_exists('provincia', $data) ? $data['provincia'] : null;
        $municipio = array_key_exists('municipio', $data) ? $data['municipio'] : null;
        $this->addMunicipioForm($form, $municipio, $provincia);
    }
}