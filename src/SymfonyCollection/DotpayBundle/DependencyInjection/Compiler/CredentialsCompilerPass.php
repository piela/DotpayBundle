<?php

namespace SymfonyCollection\DotpayBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

class CredentialsCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $establishedCredentials = [];

        foreach($container->findTaggedServiceIds('dotpay_credentials') as $id => $attrs) {
            $establishedCredentials[] = new Reference($id);
        }

        $establishedCredentials[] = new Definition(
            'SymfonyCollection\DotpayBundle\Credentials\ExtensionCredentials', [
                new Reference('service_container')
            ]
        );

        $container->setDefinition('dotpay_credentials', new Definition(
            'SymfonyCollection\DotpayBundle\Credentials\CachedCredentials', [
                new Definition(
                    'SymfonyCollection\DotpayBundle\Credentials\EstablishedCredentialsChain',
                    $establishedCredentials
                )
            ]
        ));
    }

}