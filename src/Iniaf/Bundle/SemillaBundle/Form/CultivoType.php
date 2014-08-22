<?php

namespace Iniaf\Bundle\SemillaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CultivoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', 'text', array(
                'label' => 'Nombre',
                'attr'  => array(
                    'onkeyup'   =>  'javascript:this.value=this.value.toUpperCase();',
                    'class'     =>  'form-control')
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Iniaf\Bundle\SemillaBundle\Model\CultivoModel'
        ));
    }

    public function getName()
    {
        return 'cultivo';
    }
}