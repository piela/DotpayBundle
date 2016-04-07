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
        $queryParameters[] = ('' != $payment->getLang()) ? sprintf('lang=%s', $payment->getLang()): '';
        $queryParameters[] = (null != $payment->getChannel()) ? sprintf('channel=%s', $payment->getChannel()->getNumber()): '';
        $queryParameters[] = (true === $payment->getChLock()) ? 'ch_lock=1' : 'ch_lock=0';
        $queryParameters[] = ('' !== $payment->getUrl()) ? sprintf('url=%s', $payment->getUrl()): '';
        $queryParameters[] = ('' !== $payment->getType()) ? sprintf('type=%s', $payment->getType()): '';
        $queryParameters[] = ('' != $payment->getButtontext()) ? sprintf('buttontext=%s', $payment->getButtontext()): '';
        $queryParameters[] = ('' !== $payment->getUrlc()) ? sprintf('URLC=%s', $payment->getUrlc()): '';
        $queryParameters[] = ('' !== $payment->getControl()) ? sprintf('control=%s', $payment->getControl()): '';
        $queryParameters[] = ('' != $payment->getFirstname()) ? sprintf('firstname=%s', $payment->getFirstname()): '';
        $queryParameters[] = ('' != $payment->getLastname()) ? sprintf('lastname=%s', $payment->getLastname()): '';
        $queryParameters[] = ('' != $payment->getEmail()) ? sprintf('email=%s', $payment->getEmail()): '';
        $queryParameters[] = ('' != $payment->getStreet()) ? sprintf('street=%s', $payment->getStreet()): '';
        $queryParameters[] = ('' != $payment->getStreetN1()) ? sprintf('street_n1=%s', $payment->getStreetN1()): '';
        $queryParameters[] = ('' != $payment->getStreetN2()) ? sprintf('street_n2=%s', $payment->getStreetN2()): '';
        $queryParameters[] = ('' != $payment->getState()) ? sprintf('state=%s', $payment->getStreetN2()): '';
        $queryParameters[] = ('' != $payment->getAddr3()) ? sprintf('addr_3=%s', $payment->getAddr3()): '';
        $queryParameters[] = ('' != $payment->getCity()) ? sprintf('city=%s', $payment->getCity()): '';
        $queryParameters[] = ('' != $payment->getPostcode()) ? sprintf('postcode=%s', $payment->getPostcode()): '';
        $queryParameters[] = ('' != $payment->getPhone()) ? sprintf('phone=%s', $payment->getPhone()): '';
        $queryParameters[] = ('' != $payment->getCountry()) ? sprintf('country=%s', $payment->getCountry()): '';
        $queryParameters[] = ('' != $payment->getPInfo()) ? sprintf('p_info=%s', $payment->getPInfo()): '';
        $queryParameters[] = ('' != $payment->getPEmail()) ? sprintf('p_email=%s', $payment->getPEmail()): '';
        $queryParameters[] = ('' != $payment->getBlickCode()) ? sprintf('blik_code=%s', $payment->getBlickCode()): '';

        return implode('&', array_filter($queryParameters));

    }

}