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
        foreach($this->categories() as $category) {
            $manager->persist(
                (new ChannelCategory())->setName($category[0])->setSymbol($category[1])
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
            ['CREDIT_CARDS', 'K'],
            ['E_TRANSFERS', 'T'],
            ['ONLINE_TRANSFERS', 'P'],
            ['CASH_PAYMENTS', 'G'],
            ['E_WALLET_AND_VOUCHERS', 'W'],
            ['ONLINE_INSTALLMENTS', 'R'],
            ['DEFERRED_PAYMENTS', 'O'],
            ['OTHERS', 'I']
        ];
    }
}