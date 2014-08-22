<?php

namespace Iniaf\Bundle\CooperadorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AfiliacionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaAfilicacion')
            ->add('activo')
            ->add('cooperador')
            ->add('semillera')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Iniaf\Bundle\CooperadorBundle\Entity\Afiliacion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'afiliacion';
    }
}
