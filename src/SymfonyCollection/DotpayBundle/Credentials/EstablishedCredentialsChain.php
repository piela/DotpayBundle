<?php

namespace SymfonyCollection\DotpayBundle\Credentials;

use LogicException;

/**
 * Class CredentialChain
 */
class EstablishedCredentialsChain implements EstablishedCredentials
{
    /**
     * @var array
     */
    private $chain;

    /**
     * CredentialChain constructor.
     *
     * @param EstablishedCredentials[] ...$chain
     */
    public function __construct(EstablishedCredentials ...$chain)
    {
        $this->chain = $chain;
        
    }

    /**
     * @return Credentials
     * @throws LogicException
     */
    public function credentials()
    {
        foreach ($this->chain as $establishedCredentials) {
            if ($credentials = $establishedCredentials->credentials()) {
                return $credentials;
            }
        }
        throw new LogicException('Dotpay credentials were not found');
    }
}