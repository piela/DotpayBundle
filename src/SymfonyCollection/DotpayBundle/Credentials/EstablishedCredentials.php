<?php

namespace SymfonyCollection\DotpayBundle\Credentials;


/**
 * Provides {@see Credentials}
 */
interface EstablishedCredentials
{
    /**
     * @return Credentials
     */
    public function credentials();
}