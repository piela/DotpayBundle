<?php

namespace SymfonyBundles\DotpayBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class CredentialsCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->has('dotpay_credentials')) {
            return;
        }

        $definition = $container->findDefinition(
            'dotpay_credentials'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'dotpay_credentials'
        );
        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall(
                'addProvider',
                array(new Reference($id))
            );
        }
    }
}