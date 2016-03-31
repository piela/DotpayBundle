<?php

namespace SymfonyCollection\DotpayBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Definition;

class ValidatorsCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $definition = new Definition(
            'SymfonyCollection\DotpayBundle\Validation\Validators\CheckSumValidator', [
                $container->getDefinition('dotpay_credentials')
            ]
        );
        $container->setDefinition('dotpay_checksum_validator', $definition);

        $definition2 = new Definition(
            'SymfonyCollection\DotpayBundle\Validation\Validators\OperationStatusChangedValidator', [
                $container->getDefinition('doctrine.orm.default_entity_manager')
            ]
        );
        $container->setDefinition('dotpay.validation.operation_status_changed', $definition2);

        $validators = $container->getDefinition('validator.validator_factory')->getArgument(1);
        $validators['dotpay_checksum_validator'] = 'dotpay_checksum_validator';
        $validators['dotpay.validation.operation_status_changed'] = 'dotpay.validation.operation_status_changed';
        $container->getDefinition('validator.validator_factory')->replaceArgument(1, $validators);
    }

}