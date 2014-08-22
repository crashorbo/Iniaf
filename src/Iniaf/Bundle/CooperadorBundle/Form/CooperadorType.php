<?php

namespace Iniaf\Bundle\CooperadorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CooperadorType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', 'text', array(
                'label' => 'Comunidad',
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class'=>'form-control')
            ))
            ->add('ciNit', 'text', array(
                'label' => 'Comunidad',
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class'=>'form-control')
            ))
            ->add('telefono', 'text', array(
                'label' => 'Comunidad',
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class'=>'form-control')
            ))
            ->add('celular', 'text', array(
                'label' => 'Comunidad',
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class'=>'form-control')
            ))
            ->add('direccion', 'textarea', array(
                'label' => 'Comunidad',
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class'=>'form-control')
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Iniaf\Bundle\CooperadorBundle\Model\CooperadorModel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cooperador';
    }
}
