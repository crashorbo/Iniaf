<?php

namespace Iniaf\Bundle\SemilleraBundle\Form;

use Iniaf\Bundle\LocalizacionBundle\EventListener\AddDepartamentoFieldSubscriber;
use Iniaf\Bundle\LocalizacionBundle\EventListener\AddProvinciaFieldSubscriber;
use Iniaf\Bundle\LocalizacionBundle\EventListener\AddMunicipioFieldSubscriber;
use Iniaf\Bundle\LocalizacionBundle\EventListener\AddComunidadFieldSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SemilleraType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $factory = $builder->getFormFactory();
        $departamentoSubscriber = new AddDepartamentoFieldSubscriber($factory);
        $builder->addEventSubscriber($departamentoSubscriber);
        $provinciaSubscriber = new AddProvinciaFieldSubscriber($factory);
        $builder->addEventSubscriber($provinciaSubscriber);
        $municipioSubscriber = new AddMunicipioFieldSubscriber($factory);
        $builder->addEventSubscriber($municipioSubscriber);
        $comunidadSubscriber = new AddComunidadFieldSubscriber($factory);
        $builder->addEventSubscriber($comunidadSubscriber);
        $builder
            ->add('nombre','text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('tecnicoResponsable','text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('ciNit','text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('tipo','choice', array('choices' => array(
                'NATURAL'       =>  'NATURAL',
                'JURIDICA'      =>  'JURIDICO',
                'PUBLICA'       =>  'PUBLICO',
                'PRIVADA'       =>  'PRIVADO'
            ),
                'attr'  => array(
                    'class' => 'form-control')))
            ->add('responsable','text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('direccion','textarea', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
                )
            ))
            ->add('telefono','text', array(
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' => 'form-control'
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
            'data_class' => 'Iniaf\Bundle\SemilleraBundle\Model\SemilleraModel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'semillera';
    }
}
