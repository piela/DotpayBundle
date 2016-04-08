<?php

namespace SymfonyCollection\DotpayBundle\Form\Type;

use Proxies\__CG__\SymfonyCollection\DotpayBundle\Entity\ChannelCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use SymfonyCollection\DotpayBundle\Entity\Channel;
use SymfonyCollection\DotpayBundle\Entity\OperationStatus;

class PaymentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('operationStatus', EntityType::class, [
                'class' => OperationStatus::class,
                'choice_label' => 'name'
            ])
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
            ->add('channelGroups', EntityType::class, [
                'class' => ChannelCategory::class,
                'choice_label' => 'name',
                'multiple' => true
            ])
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
            'data_class' => 'SymfonyCollection\DotpayBundle\Entity\Payment'
        ));
    }
}
