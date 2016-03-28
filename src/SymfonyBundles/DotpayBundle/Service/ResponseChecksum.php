<?php
/**
 * Created by PhpStorm.
 * User: krzysztek
 * Date: 3/28/16
 * Time: 11:08 AM
 */

namespace SymfonyBundles\DotpayBundle\Service;


use SymfonyBundles\DotpayBundle\Entity\PaymentStatus;

class ResponseChecksum
{
    private $credentials;

    /**
     * ResponseChecksum constructor.
     * @param $credentials
     */
    public function __construct($credentials)
    {
        $this->credentials = $credentials;
    }

    public function checksum(PaymentStatus $status) {

    }

}