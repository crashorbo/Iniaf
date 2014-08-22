<?php

namespace Iniaf\Bundle\CertificacionBundle\Form;

use Doctrine\Common\Cache\ZendDataCache;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HojaInspeccionType extends AbstractType
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
            ->add('numeroInspeccion', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('nombreLugar', 'text', array(
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
            ->add('fechaSiembra', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control',
                    'OnFocus'   => 'this.blur()',
                    'disabled'  => '',
                ),
            ))
            ->add('fechaFloracion','text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control',
                    'OnFocus'   => 'this.blur()',
                    'disabled'  => '',
                ),
            ))
            ->add('fechaCosecha','text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control',
                    'OnFocus'   => 'this.blur()',
                    'disabled'  => '',
                ),

            ))
            ->add('aislamiento', 'choice', array(
                'choices'   =>  array(
                    'SI'    =>  'SI',
                    'NO'    =>  'NO'
                ),
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control')
            ))
            ->add('poblacionHectarea','text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control',
                    'OnFocus'   => 'this.blur()'
                ),
            ))
            ->add('controlMaleza', 'choice', array(
                'choices'   =>  array(
                    'BUENO'     =>  'BUENO',
                    'REGULAR'   =>  'REGULAR',
                    'MALO'      =>  'MALO'
                ),
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control')
            ))
            ->add('controlInsectos', 'choice', array(
                'choices'   =>  array(
                    'BUENO'     =>  'BUENO',
                    'REGULAR'   =>  'REGULAR',
                    'MALO'      =>  'MALO'
                ),
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control')
            ))
            ->add('controlEnfermedades', 'choice', array(
                'choices'   =>  array(
                    'BUENO'     =>  'BUENO',
                    'REGULAR'   =>  'REGULAR',
                    'MALO'      =>  'MALO'
                ),
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control')
            ))
            ->add('estadoGeneral', 'choice', array(
                'choices'   =>  array(
                    'BUENO'     =>  'BUENO',
                    'REGULAR'   =>  'REGULAR',
                    'MALO'      =>  'MALO'
                ),
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control')
            ))
            ->add('mezclaVarietal', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('mvpi', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('papi', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('cumpleNorma', 'choice', array(
                'choices'   =>  array(
                    'SI'    =>  'SI',
                    'NO'    =>  'NO'
                ),
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('personaIndicaciones', 'text', array(
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
            ->add('generacionUtilizada', 'hidden')
            ->add('generacionPretendida', 'hidden')
            ->add('cultivoAnterior', 'text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control',
                    'disabled'  => '',
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
            'data_class' => 'Iniaf\Bundle\CertificacionBundle\Model\InspeccionModel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'extranet_hojainspeccion';
    }
}
