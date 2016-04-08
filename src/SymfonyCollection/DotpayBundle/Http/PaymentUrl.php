<?php

namespace SymfonyCollection\DotpayBundle\Http;

use SymfonyCollection\DotpayBundle\Entity\ChannelCategory;
use SymfonyCollection\DotpayBundle\Credentials\EstablishedCredentials;
use SymfonyCollection\DotpayBundle\Entity\Payment;

class PaymentUrl implements PaymentUrlInterface
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
        $queryParameters[] = ('' != $payment->getMerchantId()) ? sprintf('id=%s', rawurlencode($payment->getMerchantId())): '';
        $queryParameters[] = ('' != $payment->getAmount()) ? sprintf('amount=%.2f', rawurlencode($payment->getAmount())): '';
        $queryParameters[] = ('' != $payment->getCurrency()) ? sprintf('currency=%s', rawurlencode($payment->getCurrency())): '';
        $queryParameters[] = ('' != $payment->getDescription()) ? sprintf('description=%s', rawurlencode($payment->getDescription())): '';
        $queryParameters[] = ('' != $payment->getLang()) ? sprintf('lang=%s', rawurlencode($payment->getLang())): '';
        $queryParameters[] = (null != $payment->getChannel()) ? sprintf('channel=%s', rawurlencode($this->channelGroups($payment))): '';
        $queryParameters[] = (true === $payment->getChLock()) ? 'ch_lock=1' : 'ch_lock=0';
        $queryParameters[] = (0 < count($payment->getChannelGroups())) ? sprintf('channel_groups=%s', rawurlencode($this->channelGroups($payment))) : '';
        $queryParameters[] = ('' !== $payment->getUrl()) ? sprintf('url=%s', rawurlencode($payment->getUrl())): '';
        $queryParameters[] = ('' !== $payment->getType()) ? sprintf('type=%s', rawurlencode($payment->getType())): '';
        $queryParameters[] = ('' != $payment->getButtontext()) ? sprintf('buttontext=%s', rawurlencode($payment->getButtontext())): '';
        $queryParameters[] = ('' !== $payment->getUrlc()) ? sprintf('URLC=%s', rawurlencode($payment->getUrlc())): '';
        $queryParameters[] = ('' !== $payment->getControl()) ? sprintf('control=%s', rawurlencode($payment->getControl())): '';
        $queryParameters[] = ('' != $payment->getFirstname()) ? sprintf('firstname=%s', rawurlencode($payment->getFirstname())): '';
        $queryParameters[] = ('' != $payment->getLastname()) ? sprintf('lastname=%s', rawurlencode($payment->getLastname())): '';
        $queryParameters[] = ('' != $payment->getEmail()) ? sprintf('email=%s', rawurlencode($payment->getEmail())): '';
        $queryParameters[] = ('' != $payment->getStreet()) ? sprintf('street=%s', rawurlencode($payment->getStreet())): '';
        $queryParameters[] = ('' != $payment->getStreetN1()) ? sprintf('street_n1=%s', rawurlencode($payment->getStreetN1())): '';
        $queryParameters[] = ('' != $payment->getStreetN2()) ? sprintf('street_n2=%s', rawurlencode($payment->getStreetN2())): '';
        $queryParameters[] = ('' != $payment->getState()) ? sprintf('state=%s', rawurlencode($payment->getStreetN2())): '';
        $queryParameters[] = ('' != $payment->getAddr3()) ? sprintf('addr_3=%s', rawurlencode($payment->getAddr3())): '';
        $queryParameters[] = ('' != $payment->getCity()) ? sprintf('city=%s', rawurlencode($payment->getCity())): '';
        $queryParameters[] = ('' != $payment->getPostcode()) ? sprintf('postcode=%s', rawurlencode($payment->getPostcode())): '';
        $queryParameters[] = ('' != $payment->getPhone()) ? sprintf('phone=%s', rawurlencode($payment->getPhone())): '';
        $queryParameters[] = ('' != $payment->getCountry()) ? sprintf('country=%s', rawurlencode($payment->getCountry())): '';
        $queryParameters[] = ('' != $payment->getPInfo()) ? sprintf('p_info=%s', rawurlencode($payment->getPInfo())): '';
        $queryParameters[] = ('' != $payment->getPEmail()) ? sprintf('p_email=%s', rawurlencode($payment->getPEmail())): '';
        $queryParameters[] = ('' != $payment->getBlickCode()) ? sprintf('blik_code=%s', rawurlencode($payment->getBlickCode())): '';

        return (
            implode(
                '&',
                array_filter($queryParameters)
            )
        );

    }

    /**
     * @param Payment $payment
     * @return string
     */
    private function channelGroups(Payment $payment)
    {
        return implode(
            ',',
            array_map(
                function(ChannelCategory $category) {
                    return $category->getSymbol();
                },
                $payment->getChannelGroups()->toArray()
            )
        );
    }

}