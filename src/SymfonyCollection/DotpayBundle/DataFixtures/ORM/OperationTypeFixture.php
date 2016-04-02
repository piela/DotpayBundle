<?php

namespace SymfonyCollection\DotpayBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SymfonyCollection\DotpayBundle\Entity\OperationType;

class OperationTypeFixture implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach($this->operationNames() as $name) {
            $manager->persist((new OperationType())->setName($name));
        }
        $manager->flush();
    }

    /**
     * @return array
     */
    private function operationNames()
    {
        return [
            'payment',
            'payment_multimerchant_child',
            'payment_multimerchant_parent',
            'refund',
            'payout',
            'release_rollback',
            'unidentified_payment',
            'complaint'
        ];
    }
}