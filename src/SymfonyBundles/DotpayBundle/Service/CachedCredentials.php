<?php

namespace SymfonyBundles\DotpayBundle\Service;


/**
 *
 * @todo Shared true is enough?
 */
class CachedCredentials implements CredentialsProvider
{
    /**
     * @var Credentials
     */
    private $credentials;

    /**
     * @var CredentialsProvider
     */
    private $provider;

    /**
     * CachedCredentials constructor.
     * @param CredentialsProvider $provider
     */
    public function __construct(CredentialsProvider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return mixed
     */
    public function provideCredentials()
    {
        if ($this->credentials == null) {
            $this->credentials = $this->provider->provideCredentials();
        }
        return $this->credentials;
    }

}