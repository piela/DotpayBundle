<?php

namespace SymfonyCollection\DotpayBundle\Signature;

use SymfonyCollection\DotpayBundle\Credentials\Credentials;
use SymfonyCollection\DotpayBundle\Entity\Payment;

class PaymentSignature implements PaymentSignatureInterface
{
    /**
     * @var Credentials
     */
    private $credentials;

    /**
     * PaymentSignature constructor.
     * @param Credentials $credentials
     */
    public function __construct(Credentials $credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * @param Payment $payment
     * @return string
     */
    public function sign(Payment $payment)
    {
        return hash('sha256', sprintf(
            str_repeat('%s', 61),
            $this->credentials->pin(),  // PIN
            $payment->getApiVersion(), // api_version
            '', // charset
            $payment->getLang(), // lang
            $payment->getMerchantId(), // id
            $payment->getAmount(), // amount
            $payment->getCurrency(), // currency
            $payment->getDescription(), // description
            $payment->getControl(), // control
            $payment->getChannel()->getNumber(), // channel
            '', // credit_card_brand
            $payment->getChLock(), // ch_lock
            '', // channel_groups
            '', // onlinetransfer
            $payment->getUrl(), // url
            $payment->getType(), // type
            $payment->getButtontext(), // buttontext
            $payment->getUrlc(), // urlc
            $payment->getFirstname(), // firstname
            $payment->getLastname(), // lastname
            $payment->getEmail(), // email
            $payment->getStreet(), // street
            $payment->getStreetN1(), // street_n1
            $payment->getStreetN2(), // street_n2
            $payment->getState(), // state
            $payment->getAddr3(), // addr3
            $payment->getCity(), // city
            $payment->getPostcode(), // postcode
            $payment->getPhone(), // phone
            $payment->getCountry(), // country
            '', // code
            $payment->getPInfo(), // p_info
            $payment->getPEmail(), // p_email
            '', // n_email
            '', // expiration_date
            '', // recipient_account_number
            '', // recipient_company
            '', // recipient_first_name
            '', // recipient_last_name
            '', // recipient_address_street +
            '', // recipient_address_building
            '', // recipient_address_apartment
            '', // recipient_address_postcode
            '', // recipient_address_city
            '', // warranty
            '', // bylaw
            '', // personal_data
            '', // credit_card_number
            '', // credit_card_expiration_date_year
            '', // credit_card_expiration_date_month
            '', // credit_card_security_code
            '', // credit_card_store
            '', // credit_card_store_security_code
            '', // credit_card_customer_id
            '' , // credit_card_id,
            $payment->getBlickCode(),
            '', // credit_card_registration
            '', // recurring_frequency
            '', // recurring_interval
            '', // recurring_start
            '' // recurring_count
        ));
    }

}