<?php

namespace SymfonyCollection\DotpayBundle\Form\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use SymfonyCollection\DotpayBundle\Entity\Channel;

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
            ->add('channel', EntityType::class, [
                'class' => Channel::class,
                'choice_label' => 'name'
            ])
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
            ->add('blickCode')
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
