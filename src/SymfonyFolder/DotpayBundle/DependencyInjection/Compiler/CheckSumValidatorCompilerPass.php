<?php

namespace SymfonyFolder\DotpayBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Definition;

class CheckSumValidatorCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $definition = new Definition(
            'SymfonyFolder\DotpayBundle\Validator\CheckSumValidator', [
                $container->getDefinition('dotpay_credentials')
            ]
        );
        $container->setDefinition('dotpay_checksum_validator', $definition);

        $validators = $container->getDefinition('validator.validator_factory')->getArgument(1);
        $validators['dotpay_checksum_validator'] = 'dotpay_checksum_validator';
        $container->getDefinition('validator.validator_factory')->replaceArgument(1, $validators);
    }

}