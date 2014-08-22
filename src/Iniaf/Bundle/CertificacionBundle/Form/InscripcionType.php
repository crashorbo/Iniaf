<?php

namespace Iniaf\Bundle\CertificacionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InscripcionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('campana','text', array(
                'attr'  =>  array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' =>  'form-control',
                )
            ))
            ->add('semillera','text', array(
                'attr'  =>  array(
                    'class' =>  'form-control hidden',
                    'id'    =>  'disabledTextInput'
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Iniaf\Bundle\CertificacionBundle\Model\InscripcionModel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'inscripcion';
    }
}
