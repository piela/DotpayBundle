<?php

namespace SymfonyCollection\DotpayBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Channel
 *
 * @ORM\Table(name="dotpay_channel")
 * @ORM\Entity(repositoryClass="SymfonyCollection\DotpayBundle\Repository\ChannelRepository")
 */
class Channel
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
     * @ORM\ManyToOne(targetEntity="ChannelCategory")
     * @ORM\JoinColumn(name="channel_category_id", referencedColumnName="id", nullable=false)
     */
    private $channelCategory;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="smallint")
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="provider", type="string", length=255)
     */
    private $provider;

    /**
     * @var string
     *
     * @ORM\Column(name="logotype", type="string", length=255)
     */
    private $logotype;

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
     * Set number
     *
     * @param integer $number
     *
     * @return Channel
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Channel
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set provider
     *
     * @param string $provider
     *
     * @return Channel
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * Get provider
     *
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Set logotype
     *
     * @param string $logotype
     *
     * @return Channel
     */
    public function setLogotype($logotype)
    {
        $this->logotype = $logotype;

        return $this;
    }

    /**
     * Get logotype
     *
     * @return string
     */
    public function getLogotype()
    {
        return $this->logotype;
    }

    /**
     * Set channelCategory
     *
     * @param ChannelCategory $channelCategory
     *
     * @return Channel
     */
    public function setChannelCategory(ChannelCategory $channelCategory)
    {
        $this->channelCategory = $channelCategory;

        return $this;
    }

    /**
     * Get channelCategory
     *
     * @return ChannelCategory
     */
    public function getChannelCategory()
    {
        return $this->channelCategory;
    }
}
