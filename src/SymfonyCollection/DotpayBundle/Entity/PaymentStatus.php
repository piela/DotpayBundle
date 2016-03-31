<?php

namespace SymfonyCollection\DotpayBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaymentStatus
 *
 * @ORM\Table(name="dotpay_payment_status")
 * @ORM\Entity(repositoryClass="SymfonyCollection\DotpayBundle\Repository\PaymentStatusRepository")
 */
class PaymentStatus
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="merchant_id", type="integer")
     */
    private $merchantId;

    /**
     * @var string
     *
     * @ORM\Column(name="operation_number", type="string", length=255)
     */
    private $operationNumber;

    /**
     * @ORM\ManyToOne(targetEntity="OperationType")
     * @ORM\JoinColumn(name="operation_type_id", referencedColumnName="id", nullable=false)
     */
    private $operationType;

    /**
     * @ORM\ManyToOne(targetEntity="OperationStatus")
     * @ORM\JoinColumn(name="operation_status_id", referencedColumnName="id", nullable=false)
     */
    private $operationStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="operation_amount", type="string", length=10)
     */
    private $operationAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="operation_currency", type="string", length=3)
     */
    private $operationCurrency;

    /**
     * @var string
     *
     * @ORM\Column(name="operation_withdrawal_amount", type="string", length=10)
     */
    private $operationWithdrawalAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="operation_commission_amount", type="string", length=10)
     */
    private $operationCommissionAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="operation_original_amount", type="string", length=10)
     */
    private $operationOriginalAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="operation_original_currency", type="string", length=3)
     */
    private $operationOriginalCurrency;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="operation_datetime", type="date")
     */
    private $operationDatetime;

    /**
     * @var string
     *
     * @ORM\Column(name="operation_related_number", type="string", length=255)
     */
    private $operationRelatedNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="control", type="string", length=1000)
     */
    private $control;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="p_info", type="string", length=300)
     */
    private $pInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="p_email", type="string", length=100)
     */
    private $pEmail;

    /**
     * @var int
     *
     * @ORM\Column(name="channel", type="integer")
     */
    private $channel;

    /**
     * @var string
     *
     * @ORM\Column(name="channel_country", type="string", length=3)
     */
    private $channelCountry;

    /**
     * @var string
     *
     * @ORM\Column(name="geoip_country", type="string", length=3)
     */
    private $geoipCountry;

    /**
     * @var string
     *
     * @ORM\Column(name="signature", type="string", length=255, unique=true)
     */
    private $signature;


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
     * Set merchantId
     *
     * @param integer $merchantId
     *
     * @return PaymentStatus
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;

        return $this;
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
     * Set operationNumber
     *
     * @param string $operationNumber
     *
     * @return PaymentStatus
     */
    public function setOperationNumber($operationNumber)
    {
        $this->operationNumber = $operationNumber;

        return $this;
    }

    /**
     * Get operationNumber
     *
     * @return string
     */
    public function getOperationNumber()
    {
        return $this->operationNumber;
    }

    /**
     * Set operationType
     *
     * @param OperationType $operationType
     *
     * @return PaymentStatus
     */
    public function setOperationType(OperationType $operationType = null)
    {
        $this->operationType = $operationType;

        return $this;
    }

    /**
     * Get operationType
     *
     * @return OperationType
     */
    public function getOperationType()
    {
        return $this->operationType;
    }

    /**
     * Set operationStatus
     *
     * @param string $operationStatus
     *
     * @return PaymentStatus
     */
    public function setOperationStatus($operationStatus)
    {
        $this->operationStatus = $operationStatus;

        return $this;
    }

    /**
     * Get operationStatus
     *
     * @return string
     */
    public function getOperationStatus()
    {
        return $this->operationStatus;
    }

    /**
     * Set operationAmount
     *
     * @param string $operationAmount
     *
     * @return PaymentStatus
     */
    public function setOperationAmount($operationAmount)
    {
        $this->operationAmount = $operationAmount;

        return $this;
    }

    /**
     * Get operationAmount
     *
     * @return string
     */
    public function getOperationAmount()
    {
        return $this->operationAmount;
    }

    /**
     * Set operationCurrency
     *
     * @param string $operationCurrency
     *
     * @return PaymentStatus
     */
    public function setOperationCurrency($operationCurrency)
    {
        $this->operationCurrency = $operationCurrency;

        return $this;
    }

    /**
     * Get operationCurrency
     *
     * @return string
     */
    public function getOperationCurrency()
    {
        return $this->operationCurrency;
    }

    /**
     * Set operationWithdrawalAmount
     *
     * @param string $operationWithdrawalAmount
     *
     * @return PaymentStatus
     */
    public function setOperationWithdrawalAmount($operationWithdrawalAmount)
    {
        $this->operationWithdrawalAmount = $operationWithdrawalAmount;

        return $this;
    }

    /**
     * Get operationWithdrawalAmount
     *
     * @return string
     */
    public function getOperationWithdrawalAmount()
    {
        return $this->operationWithdrawalAmount;
    }

    /**
     * Set operationCommissionAmount
     *
     * @param string $operationCommissionAmount
     *
     * @return PaymentStatus
     */
    public function setOperationCommissionAmount($operationCommissionAmount)
    {
        $this->operationCommissionAmount = $operationCommissionAmount;

        return $this;
    }

    /**
     * Get operationCommissionAmount
     *
     * @return string
     */
    public function getOperationCommissionAmount()
    {
        return $this->operationCommissionAmount;
    }

    /**
     * Set operationOriginalAmount
     *
     * @param string $operationOriginalAmount
     *
     * @return PaymentStatus
     */
    public function setOperationOriginalAmount($operationOriginalAmount)
    {
        $this->operationOriginalAmount = $operationOriginalAmount;

        return $this;
    }

    /**
     * Get operationOriginalAmount
     *
     * @return string
     */
    public function getOperationOriginalAmount()
    {
        return $this->operationOriginalAmount;
    }

    /**
     * Set operationOriginalCurrency
     *
     * @param string $operationOriginalCurrency
     *
     * @return PaymentStatus
     */
    public function setOperationOriginalCurrency($operationOriginalCurrency)
    {
        $this->operationOriginalCurrency = $operationOriginalCurrency;

        return $this;
    }

    /**
     * Get operationOriginalCurrency
     *
     * @return string
     */
    public function getOperationOriginalCurrency()
    {
        return $this->operationOriginalCurrency;
    }

    /**
     * Set operationDatetime
     *
     * @param \DateTime $operationDatetime
     *
     * @return PaymentStatus
     */
    public function setOperationDatetime($operationDatetime)
    {
        $this->operationDatetime = $operationDatetime;

        return $this;
    }

    /**
     * Get operationDatetime
     *
     * @return \DateTime
     */
    public function getOperationDatetime()
    {
        return $this->operationDatetime;
    }

    /**
     * Set operationRelatedNumber
     *
     * @param string $operationRelatedNumber
     *
     * @return PaymentStatus
     */
    public function setOperationRelatedNumber($operationRelatedNumber)
    {
        $this->operationRelatedNumber = $operationRelatedNumber;

        return $this;
    }

    /**
     * Get operationRelatedNumber
     *
     * @return string
     */
    public function getOperationRelatedNumber()
    {
        return $this->operationRelatedNumber;
    }

    /**
     * Set control
     *
     * @param string $control
     *
     * @return PaymentStatus
     */
    public function setControl($control)
    {
        $this->control = $control;

        return $this;
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
     * Set description
     *
     * @param string $description
     *
     * @return PaymentStatus
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
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
     * Set email
     *
     * @param string $email
     *
     * @return PaymentStatus
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
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
     * Set pInfo
     *
     * @param string $pInfo
     *
     * @return PaymentStatus
     */
    public function setPInfo($pInfo)
    {
        $this->pInfo = $pInfo;

        return $this;
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
     * Set pEmail
     *
     * @param string $pEmail
     *
     * @return PaymentStatus
     */
    public function setPEmail($pEmail)
    {
        $this->pEmail = $pEmail;

        return $this;
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
     * Set channel
     *
     * @param integer $channel
     *
     * @return PaymentStatus
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
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
     * Set channelCountry
     *
     * @param string $channelCountry
     *
     * @return PaymentStatus
     */
    public function setChannelCountry($channelCountry)
    {
        $this->channelCountry = $channelCountry;

        return $this;
    }

    /**
     * Get channelCountry
     *
     * @return string
     */
    public function getChannelCountry()
    {
        return $this->channelCountry;
    }

    /**
     * Set geoipCountry
     *
     * @param string $geoipCountry
     *
     * @return PaymentStatus
     */
    public function setGeoipCountry($geoipCountry)
    {
        $this->geoipCountry = $geoipCountry;

        return $this;
    }

    /**
     * Get geoipCountry
     *
     * @return string
     */
    public function getGeoipCountry()
    {
        return $this->geoipCountry;
    }

    /**
     * Set signature
     *
     * @param string $signature
     *
     * @return PaymentStatus
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * Get signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

}
