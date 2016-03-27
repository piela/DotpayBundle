<?php
/**
 * Created by PhpStorm.
 * User: krzysztek
 * Date: 3/27/16
 * Time: 11:19 PM
 */

namespace SymfonyBundles\DotpayBundle\Service;


/**
 * Class CredentialsLocator
 * @package SymfonyBundles\DotpayBundle\Service
 * @todo Caching
 */
class CredentialsLocator implements CredentialsProvider
{
    /**
     * @var array
     */
    private $providers;

    public function __construct()
    {
        $this->providers = [];
    }

    public function addProvider(CredentialsProvider $provider)
    {
        $this->providers[] = $provider;
    }

    public function provideCredentials()
    {
        foreach ($this->providers as $provider) {
            if ($credentials = $provider->provideCredentials()) {
                return $credentials;
            }
        }
        throw new LogicException('Dotpay credentials not found');
    }
}