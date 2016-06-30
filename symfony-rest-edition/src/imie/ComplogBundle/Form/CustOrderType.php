<?php

namespace imie\ComplogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustOrderType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('createdAt')
            ->add('customer', 'entity', array(
                // query choices from this entity
                'class' => 'imieComplogBundle:Customer',

                // use the User.username property as the visible option string
                'choice_label' => 'name',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'imie\ComplogBundle\Entity\CustOrder'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'imie_complogbundle_custorder';
    }
}
