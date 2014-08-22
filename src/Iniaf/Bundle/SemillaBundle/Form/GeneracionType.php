<?php

namespace Iniaf\Bundle\SemillaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Iniaf\Bundle\SemillaBundle\Form\EventListener\AddCategoriaFieldSubscriber;
use Iniaf\Bundle\SemillaBundle\Form\EventListener\AddCultivoFieldSubscriber;

class GeneracionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $factory = $builder->getFormFactory();
        $cultivoSubscriber = new AddCultivoFieldSubscriber($factory);
        $builder->addEventSubscriber($cultivoSubscriber);
        $categoriaSubscriber = new AddCategoriaFieldSubscriber($factory);
        $builder->addEventSubscriber($categoriaSubscriber);
        $builder
            ->add('nombre', 'text', array(
                'label' => 'Nombre',
                'attr'  => array(
                    'onkeyup'=>'javascript:this.value=this.value.toUpperCase();',
                    'class' =>'form-control')
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Iniaf\Bundle\SemillaBundle\Model\GeneracionModel'
        ));
    }

    public function getName()
    {
        return 'generacion';
    }
}