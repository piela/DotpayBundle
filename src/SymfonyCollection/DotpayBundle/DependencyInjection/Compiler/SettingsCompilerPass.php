<?php

namespace SymfonyCollection\DotpayBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Definition;
use SymfonyCollection\DotpayBundle\Dotpay\Settings;

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
            Settings::class, [
                $container->getParameter('dotpay.ip')
            ]
        );

        $container->setDefinition('dotpay.settings', $settings);
    }

}