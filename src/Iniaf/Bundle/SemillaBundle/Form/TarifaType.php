<?php

namespace Iniaf\Bundle\SemillaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TarifaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion','textarea', array(
                'label' => 'Descripcion',
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class'     =>  'form-control')
            ))
            ->add('monto','number', array(
                'attr'  => array(
                    'class'     =>  'form-control')
            ))
            ->add('cultivo', 'entity', array(
                'class' =>  'SemillaBundle:Cultivo',
                'attr'  => array(
                    'class'     =>  'form-control')
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Iniaf\Bundle\SemillaBundle\Entity\Tarifa'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'iniaf_bundle_semillabundle_tarifa';
    }
}
