<?php

namespace SymfonyBundles\DotpayBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Definition;

class CheckSumValidatorCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $definition = new Definition(
            'SymfonyBundles\DotpayBundle\Validator\CheckSumConstraintValidator', [
                $container->getDefinition('dotpay_credentials')
            ]
        );
        $definition->addTag('name', ['name' => 'validator.constraint_validator']);
        $definition->addTag('alias', ['alias' => 'dotpay_checksum_validator']);
        $container->setDefinition('dotpay_checksum_validator', $definition);
    }

}