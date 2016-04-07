<?php

namespace SymfonyCollection\DotpayBundle\Credentials;


use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * ExtensionCredentials
 */
class ExtensionCredentials implements EstablishedCredentials
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * ExtensionCredentials
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return Credentials
     */
    public function credentials()
    {
        return new Credentials(
            $this->container->getParameter('dotpay.id'),
            $this->container->getParameter('dotpay.pin')
        );
    }
}