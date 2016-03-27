<?php

namespace SymfonyBundles\DotpayBundle\Service;

class Credentials
{
    /**
     * @var integer
     */
    private $pin;

    /**
     * @var integer
     */
    private $id;

    /**
     * Credentials constructor.
     * @param int $id
     * @param int $pin
     */
    public function __construct($id, $pin)
    {
        $this->id = $id;
        $this->pin = $pin;
    }

    /**
     * @return int
     */
    public function pin()
    {
        return $this->pin;
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

}