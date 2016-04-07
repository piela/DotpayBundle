<?php


namespace SymfonyCollection\DotpayBundle\Dotpay;


class DotpaySettings
{
    /**
     * @var string
     */
    private $ip;

    /**
     * DotpayConfig constructor.
     * @param string $ip
     */
    public function __construct($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return string
     */
    public function ip()
    {
        return $this->ip;
    }

}