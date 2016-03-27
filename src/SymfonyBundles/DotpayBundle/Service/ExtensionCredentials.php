<?php

namespace SymfonyBundles\DotpayBundle\Service;


use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ExtensionCredentials
 * @package SymfonyBundles\DotpayBundle\Service
 */
class ExtensionCredentials implements CredentialsProvider
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $pin;


    /**
     * ConfigurationCredentials constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->id = $container->getParameter('symfony_bundles_dotpay_id');
        $this->pin =  $container->getParameter('symfony_bundles_dotpay_pin');
    }

    /**
     * @return Credentials
     */
    public function provideCredentials()
    {
        return new Credentials(
            $this->id,
            $this->pin
        );
    }
}