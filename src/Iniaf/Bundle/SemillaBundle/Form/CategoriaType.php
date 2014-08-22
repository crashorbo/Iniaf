<?php

namespace Iniaf\Bundle\SemillaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoriaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cultivo','entity',array(
                'class'         => 'SemillaBundle:Cultivo',
                'label'         => 'Cultivo',
                'empty_value'   => 'Cultivo',
                'attr'  => array(
                    'class'     =>  'form-control')
            ))
            ->add('nombre', 'text', array(
                'label' => 'Nombre',
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class'     =>  'form-control')
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Iniaf\Bundle\SemillaBundle\Model\CategoriaModel'
        ));
    }

    public function getName()
    {
        return 'categoria';
    }
}