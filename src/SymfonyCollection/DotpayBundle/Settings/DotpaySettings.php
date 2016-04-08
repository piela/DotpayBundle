<?php


namespace SymfonyCollection\DotpayBundle\Settings;


/**
 * DotpaySettings
 */
class DotpaySettings implements DotpaySettingsInterface
{
    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $api;

    /**
     * @param string $api
     * @param string $ip
     */
    public function __construct($api, $ip)
    {
        $this->api = $api;
        $this->ip = $ip;
    }

    /**
     * @return string
     */
    public function ip()
    {
        return $this->ip;
    }

    /**
     * @return string
     */
    public function api()
    {
        return $this->api;
    }

}