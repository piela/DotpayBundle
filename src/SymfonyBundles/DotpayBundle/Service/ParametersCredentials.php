<?php

namespace SymfonyBundles\DotpayBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ParametersCredentials
 * @package SymfonyBundles\DotpayBundle\Service
 */
class ParametersCredentials implements CredentialsProvider
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
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->id = $container->getParameter('dotpay')['id'];
        $this->pin =  $container->getParameter('dotpay')['pin'];
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