<?php

namespace SymfonyCollection\DotpayBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaymentRequestType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('apiVersion')
            ->add('merchantId')
            ->add('amount')
            ->add('currency')
            ->add('description')
            ->add('lang')
            ->add('channel')
            ->add('chLock')
            ->add('url')
            ->add('type')
            ->add('buttontext')
            ->add('urlc')
            ->add('control')
            ->add('firstname')
            ->add('lastname')
            ->add('email')
            ->add('street')
            ->add('streetN1')
            ->add('streetN2')
            ->add('state')
            ->add('addr3')
            ->add('city')
            ->add('postcode')
            ->add('phone')
            ->add('country')
            ->add('pInfo')
            ->add('pEmail')
            ->add('errorCode')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SymfonyCollection\DotpayBundle\Entity\PaymentRequest'
        ));
    }
}
