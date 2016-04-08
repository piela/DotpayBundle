<?php

namespace SymfonyCollection\DotpayBundle\Dotpay;

interface PaymentUrlInterface
{
    public function __toString();
    public function url();
    public function queryString();

}