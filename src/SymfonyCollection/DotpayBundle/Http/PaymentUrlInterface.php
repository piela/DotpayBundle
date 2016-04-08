<?php

namespace SymfonyCollection\DotpayBundle\Http;

interface PaymentUrlInterface
{
    public function __toString();
    public function url();
    public function queryString();

}