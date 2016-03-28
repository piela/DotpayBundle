<?php

namespace SymfonyCollection\DotpayBundle\Credentials;

/**
 * Credentials
 */
class Credentials
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $pin;

    /**
     * Credentials
     * 
     * @param int $id
     * @param string $pin
     */
    public function __construct($id, $pin)
    {
        $this->id = $id;
        $this->pin = $pin;
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function pin()
    {
        return $this->pin;
    }

}