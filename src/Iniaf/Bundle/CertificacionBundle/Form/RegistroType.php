<?php

namespace Iniaf\Bundle\CertificacionBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistroType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cooperador', 'hidden')
            ->add('nroCampo', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control')
            ))
            ->add('superficie', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('fechaSiembra', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('aislamiento', 'choice', array(
                'choices'   =>  array(
                    '1' =>  'SI',
                    '0' =>  'NO'
                ),
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('fechaFloracion', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('fechaCosecha', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('plantasMetro', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('distanciaSurco', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('poblacion', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control',
                    'OnFocus'   => 'this.blur()'
                )
            ))
            ->add('variedad', 'hidden')
            ->add('generacion', 'hidden')
            ->add('cultivoAnterior','text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('generacionPretendida', 'hidden')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Iniaf\Bundle\CertificacionBundle\Model\RegistroModel',
            'csrf_protection' => false,
            'validation_groups' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'extranet_registrocampo';
    }
}
