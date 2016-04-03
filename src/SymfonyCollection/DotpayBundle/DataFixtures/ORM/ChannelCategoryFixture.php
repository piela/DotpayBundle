<?php

namespace SymfonyCollection\DotpayBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SymfonyCollection\DotpayBundle\Entity\ChannelCategory;

class ChannelCategoryFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach($this->categories() as $name) {
            $manager->persist(
                (new ChannelCategory())->setName($name)
            );
        }
        $manager->flush();
    }

    /**
     * @return array
     */
    private function categories()
    {
        return [
            'CREDIT_CARDS',
            'E_TRANSFERS',
            'ONLINE_TRANSFERS',
            'CASH_PAYMENTS',
            'MOBILE_PAYMENTS',
            'E_WALLET_AND_VOUCHERS',
            'ONLINE_INSTALLMENTS',
            'DEFERRED_PAYMENTS',
            'OTHERS'
        ];
    }
}