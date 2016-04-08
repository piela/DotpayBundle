<?php

namespace SymfonyCollection\DotpayBundle\Signature;

use SymfonyCollection\DotpayBundle\Entity\Payment;

interface PaymentSignatureInterface
{
    /**
     * @param Payment $payment
     * @return string
     */
    public function sign(Payment $payment);
}