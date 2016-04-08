<?php

namespace SymfonyCollection\DotpayBundle\Settings;

interface DotpaySettingsInterface
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