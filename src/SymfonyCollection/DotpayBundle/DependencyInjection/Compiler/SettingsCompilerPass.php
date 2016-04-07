<?php

namespace SymfonyCollection\DotpayBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Definition;

/**
 * SettingsCompilerPass
 */
class SettingsCompilerPass implements CompilerPassInterface
{
    
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $settings = new Definition(
            'SymfonyCollection\DotpayBundle\Dotpay\DotpaySettings', [
                $container->getParameter('dotpay.ip')
            ]
        );

        $container->setDefinition('dotpay.settings', $settings);
    }

}