<?php

namespace Iniaf\Bundle\LocalizacionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Iniaf\Bundle\LocalizacionBundle\Form\EventListener\AddDepartamentoFieldSubscriber;
use Iniaf\Bundle\LocalizacionBundle\Form\EventListener\AddProvinciaFieldSubscriber;
use Iniaf\Bundle\LocalizacionBundle\Form\EventListener\AddMunicipioFieldSubscriber;

class LocalizacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $factory = $builder->getFormFactory();
        $departamentoSubscriber = new AddDepartamentoFieldSubscriber($factory);
        $builder->addEventSubscriber($departamentoSubscriber);
        $provinciaSubscriber = new AddProvinciaFieldSubscriber($factory);
        $builder->addEventSubscriber($provinciaSubscriber);
        $municipioSubscriber = new AddMunicipioFieldSubscriber($factory);
        $builder->addEventSubscriber($municipioSubscriber);

        $builder
            ->add('comunidad', 'text', array(
                'label' => 'Comunidad',
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class'=>'form-control')
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Iniaf\Bundle\LocalizacionBundle\Model\LocalizacionModel'
        ));
    }

    public function getName()
    {
        return 'localizacion';
    }
}