<?php

namespace SymfonyCollection\DotpayBundle\Credentials;

/**
 * CachedCredentials
 */
class CachedCredentials implements EstablishedCredentials
{
    /**
     * @var Credentials
     */
    private $credentials;

    /**
     * @var EstablishedCredentials
     */
    private $establishedCredentials;

    /**
     * CachedCredentials
     *
     * @param EstablishedCredentials
     */
    public function __construct(EstablishedCredentials $establishedCredentials)
    {
        $this->establishedCredentials = $establishedCredentials;
    }

    /**
     * @return Credentials
     */
    public function credentials()
    {
        if ($this->credentials == null) {
            $this->credentials = $this->establishedCredentials->credentials();
        }
        return $this->credentials;
    }

}