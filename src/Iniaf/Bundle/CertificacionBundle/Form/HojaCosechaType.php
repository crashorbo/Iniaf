<?php

namespace Iniaf\Bundle\CertificacionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HojaCosechaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('plantaAcondicionadora', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('superficie', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('mezclaVarietal', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('plantasAnormales', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('rendimientoD', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('rendimientoCampo', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('cupones', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('serieCupones', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('campoAprobado', 'choice', array(
                'choices'   =>  array(
                    'SI'    =>  'SI',
                    'NO'    =>  'NO'
                ),
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('personaEntregado', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('descripcionMezcla', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('observaciones', 'textarea', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('generacion', 'hidden')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Iniaf\Bundle\CertificacionBundle\Model\HojaCosechaModel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'certificacionbundle_hojacosecha';
    }
}
