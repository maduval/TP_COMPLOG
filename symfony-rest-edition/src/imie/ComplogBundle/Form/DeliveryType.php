<?php

namespace imie\ComplogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DeliveryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ref')
            ->add('deliveryAt')
//            ->add('custOrder')
            ->add('custOrder', 'entity', array(
                'class' => 'imieComplogBundle:CustOrder',
                'choice_label' => 'ref',
            ))
//            ->add('invoice')
            ->add('invoice', 'entity', array(
                'class' => 'imieComplogBundle:Invoice',
                'choice_label' => 'ref',
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'imie\ComplogBundle\Entity\Delivery'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'imie_complogbundle_delivery';
    }
}
