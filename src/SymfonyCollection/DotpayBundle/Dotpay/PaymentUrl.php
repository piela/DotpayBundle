<?php

namespace SymfonyCollection\DotpayBundle\Dotpay;

use SymfonyCollection\DotpayBundle\Credentials\EstablishedCredentials;
use SymfonyCollection\DotpayBundle\Entity\Payment;

class PaymentUrl
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var Credentials
     */
    private $credentials;

    /**
     * @var Payment
     */
    private $payment;

    /**
     * PaymentUrl constructor.
     * @param $url
     * @param Payment $payment
     */
    public function __construct($url, EstablishedCredentials $credentials, Payment $payment)
    {
        $this->url = $url;
        $this->credentials = $credentials;
        $this->payment = $payment;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            '%s?%s',
            $this->url(),
            $this->queryString()
        );
    }

    /**
     * @return string
     */
    public function url()
    {
        return sprintf('%s/', rtrim($this->url, '/'));
    }

    /**
     * @return string
     */
    public function queryString()
    {
        $payment = $this->payment;

        $queryParameters = [];
        $queryParameters[] = ('' != $payment->getMerchantId()) ? sprintf('id=%s', $payment->getMerchantId()): '';
        $queryParameters[] = ('' != $payment->getAmount()) ? sprintf('amount=%.2f', $payment->getAmount()): '';
        $queryParameters[] = ('' != $payment->getCurrency()) ? sprintf('currency=%s', $payment->getCurrency()): '';
        $queryParameters[] = ('' != $payment->getDescription()) ? sprintf('description=%s', $payment->getDescription()): '';
        $queryParameters[] = ('' != $payment->getFirstname()) ? sprintf('firstname=%s', $payment->getFirstname()): '';
        $queryParameters[] = ('' != $payment->getLastname()) ? sprintf('lastname=%s', $payment->getLastname()): '';
        $queryParameters[] = ('' != $payment->getEmail()) ? sprintf('email=%s', $payment->getEmail()): '';
        $queryParameters[] = ('' != $payment->getLang()) ? sprintf('lang=%s', $payment->getLang()): '';

        return implode('&', array_filter($queryParameters));

    }

}