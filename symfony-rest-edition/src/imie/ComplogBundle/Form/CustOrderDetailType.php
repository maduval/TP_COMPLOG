<?php

namespace imie\ComplogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustOrderDetailType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('qte')
//            ->add('product')
            ->add('product', 'entity', array(
                'class' => 'imieComplogBundle:Product',
                'choice_label' => 'name',
            ))
//            ->add('custOrder')
            ->add('custOrder', 'entity', array(
                'class' => 'imieComplogBundle:CustOrder',
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
            'data_class' => 'imie\ComplogBundle\Entity\CustOrderDetail'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'imie_complogbundle_custorderdetail';
    }
}
