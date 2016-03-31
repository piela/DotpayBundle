<?php

namespace SymfonyCollection\DotpayBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use SymfonyCollection\DotpayBundle\Entity\OperationStatus;
use SymfonyCollection\DotpayBundle\Entity\OperationType;

class PaymentStatusType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('merchantId')
            ->add('operationNumber')
            ->add('operationType', EntityType::class, [
                'class' => OperationType::class,
                'choice_label' => 'name'
            ])
            ->add('operationStatus', EntityType::class, [
                'class' => OperationStatus::class,
                'choice_label' => 'name'
            ])
            ->add('operationAmount')
            ->add('operationCurrency')
            ->add('operationWithdrawalAmount')
            ->add('operationCommissionAmount')
            ->add('operationOriginalAmount')
            ->add('operationOriginalCurrency')
            ->add('operationDatetime', DatetimeType::class)
            ->add('operationRelatedNumber')
            ->add('control')
            ->add('description')
            ->add('email')
            ->add('pInfo')
            ->add('pEmail')
            ->add('channel')
            ->add('channelCountry')
            ->add('geoipCountry')
            ->add('signature')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SymfonyCollection\DotpayBundle\Entity\PaymentStatus'
        ));
    }
}
