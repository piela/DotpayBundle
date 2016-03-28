<?php
/**
 * Created by PhpStorm.
 * User: krzysztek
 * Date: 3/28/16
 * Time: 1:29 PM
 */

namespace SymfonyCollection\DotpayBundle\Tests\Fake;


use SymfonyCollection\DotpayBundle\Entity\PaymentRequest;

class PaymentRequestFake extends PaymentRequest
{
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Get apiVersion
     *
     * @return string
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }

    /**
     * Get merchantId
     *
     * @return int
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }


    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get lang
     *
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Get channel
     *
     * @return int
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Get chLock
     *
     * @return bool
     */
    public function getChLock()
    {
        return $this->chLock;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get type
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get buttontext
     *
     * @return string
     */
    public function getButtontext()
    {
        return $this->buttontext;
    }

    /**
     * Get urlc
     *
     * @return string
     */
    public function getUrlc()
    {
        return $this->urlc;
    }

    /**
     * Get control
     *
     * @return string
     */
    public function getControl()
    {
        return $this->control;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Get streetN1
     *
     * @return string
     */
    public function getStreetN1()
    {
        return $this->streetN1;
    }

    /**
     * Set streetN2
     *
     * @param string $streetN2
     *
     * @return PaymentRequest
     */
    public function setStreetN2($streetN2)
    {
        $this->streetN2 = $streetN2;

        return $this;
    }

    /**
     * Get streetN2
     *
     * @return string
     */
    public function getStreetN2()
    {
        return $this->streetN2;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Get addr3
     *
     * @return string
     */
    public function getAddr3()
    {
        return $this->addr3;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Get pInfo
     *
     * @return string
     */
    public function getPInfo()
    {
        return $this->pInfo;
    }

    /**
     * Get pEmail
     *
     * @return string
     */
    public function getPEmail()
    {
        return $this->pEmail;
    }

    /**
     * Get errorCode
     *
     * @return string
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }
}