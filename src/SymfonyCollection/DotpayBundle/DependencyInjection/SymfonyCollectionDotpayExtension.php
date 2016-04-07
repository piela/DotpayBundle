<?php

namespace SymfonyCollection\DotpayBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class SymfonyCollectionDotpayExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('dotpay.pin', isset($configs[0]['pin']) ? $configs[0]['pin'] : '');
        $container->setParameter('dotpay.id', isset($configs[0]['id']) ? $configs[0]['id'] : null);
        $container->setParameter('dotpay.ip', isset($configs[0]['ip']) ? $configs[0]['ip'] : '');

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}
