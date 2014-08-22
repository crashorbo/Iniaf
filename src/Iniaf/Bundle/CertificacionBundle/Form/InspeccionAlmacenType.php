<?php

namespace Iniaf\Bundle\CertificacionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InspeccionAlmacenType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaInspeccion', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('numeroLote', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('t1', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('t2', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('t3', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('t4', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('t5', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('pesoBolsa', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('totalBolsas', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control',
                    'OnFocus'   => 'this.blur()'
                )
            ))
            ->add('puntajeMaximo', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control',
                    'OnFocus'   => 'this.blur()'
                )
            ))
            ->add('n1', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('n2', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('n3', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('n4', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('n5', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('n6', 'text', array(
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
            ->add('aprobado', 'choice', array(
                'choices'   =>  array(
                    'SI'    =>  'SI',
                    'NO'    =>  'NO'
                ),
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
            'data_class' => 'Iniaf\Bundle\CertificacionBundle\Model\InspeccionAlmacenModel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'extranet_inspeccionalmacen';
    }
}
