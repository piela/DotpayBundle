<?php

namespace SymfonyFolder\DotpayBundle\Credentials;


use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * ParametersCredentials
 */
class ParametersCredentials implements EstablishedCredentials
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
            $this->container->getParameter('dotpay')['id'],
            $this->container->getParameter('dotpay')['pin']
        );
    }
}