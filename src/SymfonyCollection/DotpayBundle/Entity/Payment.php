<?php

namespace SymfonyCollection\DotpayBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Payment
 *
 * @ORM\Table(name="dotpay_payment")
 * @ORM\Entity(repositoryClass="SymfonyCollection\DotpayBundle\Repository\PaymentRepository")
 */
class Payment
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
     * @ORM\ManyToOne(targetEntity="OperationStatus")
     * @ORM\JoinColumn(name="operation_status_id", referencedColumnName="id", nullable=false)
     */
    private $operationStatus;
    
    /**
     * @var string
     *
     * @ORM\Column(name="api_version", type="string", length=20, nullable=true)
     */
    private $apiVersion;

    /**
     * @var int
     *
     * @ORM\Column(name="merchant_id", type="string")
     */
    private $merchantId;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="string", length=10)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=3)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=2, nullable=true)
     */
    private $lang;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Channel")
     * @ORM\JoinColumn(name="channel_id", referencedColumnName="id", nullable=false)
     */
    private $channel;

    /**
     * @var bool
     *
     * @ORM\Column(name="ch_lock", type="boolean", nullable=true)
     */
    private $chLock;

    /**
     * @var int
     *
     * @ORM\ManyToMany(targetEntity="ChannelCategory")
     * @ORM\JoinTable(name="dotpay_channel_groups",
     *      joinColumns={@ORM\JoinColumn(name="payment_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="channel_category_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $channelGroups;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=1000, nullable=true)
     */
    private $url;
  
    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer", nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="buttontext", type="string", length=100, nullable=true)
     */
    private $buttontext;

    /**
     * @var string
     *
     * @ORM\Column(name="urlc", type="string", length=1000, nullable=true)
     */
    private $urlc;

    /**
     * @var string
     *
     * @ORM\Column(name="control", type="string", length=1000, nullable=true)
     */
    private $control;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=50, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=100, nullable=true)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="street_n1", type="string", length=30, nullable=true)
     */
    private $streetN1;

    /**
     * @var string
     *
     * @ORM\Column(name="street_n2", type="string", length=30, nullable=true)
     */
    private $streetN2;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=50, nullable=true)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="addr3", type="string", length=50, nullable=true)
     */
    private $addr3;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=50, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=20, nullable=true)
     */
    private $postcode;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=20, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=50, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="p_info", type="string", length=300, nullable=true)
     */
    private $pInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="p_email", type="string", length=100, nullable=true)
     */
    private $pEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="blick_code", type="string", length=6, nullable=true)
     */
    private $blickCode;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="ErrorCode")
     * @ORM\JoinColumn(name="error_code_id", referencedColumnName="id", nullable=true)
     */
    private $errorCode;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->channelGroups = new ArrayCollection();
    }

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
     * Set operationStatus
     *
     * @param OperationStatus $operationStatus
     *
     * @return Payment
     */
    public function setOperationStatus(OperationStatus $operationStatus)
    {
        $this->operationStatus = $operationStatus;

        return $this;
    }

    /**
     * Get operationStatus
     *
     * @return OperationStatus
     */
    public function getOperationStatus()
    {
        return $this->operationStatus;
    }
    
    /**
     * Set apiVersion
     *
     * @param string $apiVersion
     *
     * @return Payment
     */
    public function setApiVersion($apiVersion)
    {
        $this->apiVersion = $apiVersion;

        return $this;
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
     * Set merchantId
     *
     * @param integer $merchantId
     *
     * @return Payment
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
     * Set amount
     *
     * @param string $amount
     *
     * @return Payment
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
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
     * Set currency
     *
     * @param string $currency
     *
     * @return Payment
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
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
     * Set description
     *
     * @param string $description
     *
     * @return Payment
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
     * Set lang
     *
     * @param string $lang
     *
     * @return Payment
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
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
     * Set channel
     *
     * @param integer $channel
     *
     * @return Payment
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
     * Set chLock
     *
     * @param boolean $chLock
     *
     * @return Payment
     */
    public function setChLock($chLock)
    {
        $this->chLock = $chLock;

        return $this;
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
     * Add channelGroup
     *
     * @param Channel $channelGroup
     *
     * @return Payment
     */
    public function addChannelGroup(Channel $channelGroup)
    {
        $this->channelGroups[] = $channelGroup;

        return $this;
    }

    /**
     * Remove channelGroup
     *
     * @param Channel $channelGroup
     */
    public function removeChannelGroup(Channel $channelGroup)
    {
        $this->channelGroups->removeElement($channelGroup);
    }

    /**
     * Get channelGroups
     *
     * @return ArrayCollection
     */
    public function getChannelGroups()
    {
        return $this->channelGroups;
    }
    
    /**
     * Set url
     *
     * @param string $url
     *
     * @return Payment
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
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
     * Set type
     *
     * @param integer $type
     *
     * @return Payment
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
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
     * Set buttontext
     *
     * @param string $buttontext
     *
     * @return Payment
     */
    public function setButtontext($buttontext)
    {
        $this->buttontext = $buttontext;

        return $this;
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
     * Set urlc
     *
     * @param string $urlc
     *
     * @return Payment
     */
    public function setUrlc($urlc)
    {
        $this->urlc = $urlc;

        return $this;
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
     * Set control
     *
     * @param string $control
     *
     * @return Payment
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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Payment
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
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
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Payment
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
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
     * Set email
     *
     * @param string $email
     *
     * @return Payment
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
     * Set street
     *
     * @param string $street
     *
     * @return Payment
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
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
     * Set streetN1
     *
     * @param string $streetN1
     *
     * @return Payment
     */
    public function setStreetN1($streetN1)
    {
        $this->streetN1 = $streetN1;

        return $this;
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
     * @return Payment
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
     * Set state
     *
     * @param string $state
     *
     * @return Payment
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
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
     * Set addr3
     *
     * @param string $addr3
     *
     * @return Payment
     */
    public function setAddr3($addr3)
    {
        $this->addr3 = $addr3;

        return $this;
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
     * Set city
     *
     * @param string $city
     *
     * @return Payment
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
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
     * Set postcode
     *
     * @param string $postcode
     *
     * @return Payment
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
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
     * Set phone
     *
     * @param string $phone
     *
     * @return Payment
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
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
     * Set country
     *
     * @param string $country
     *
     * @return Payment
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
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
     * Set pInfo
     *
     * @param string $pInfo
     *
     * @return Payment
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
     * @return Payment
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
     * Set blickCode
     *
     * @param string $blickCode
     *
     * @return Payment
     */
    public function setBlickCode($blickCode)
    {
        $this->blickCode = $blickCode;

        return $this;
    }

    /**
     * Get blickCode
     *
     * @return string
     */
    public function getBlickCode()
    {
        return $this->blickCode;
    }

    /**
     * Set errorCode
     *
     * @param ErrorCode $errorCode
     *
     * @return Payment
     */
    public function setErrorCode(ErrorCode $errorCode = null)
    {
        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * Get errorCode
     *
     * @return ErrorCode
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

}
