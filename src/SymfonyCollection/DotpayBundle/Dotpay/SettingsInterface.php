<?php

namespace SymfonyCollection\DotpayBundle\Dotpay;

interface SettingsInterface
{
    /**
     * @return string
     */
    public function api();

    /**
     * @return string
     */
    public function ip();

}