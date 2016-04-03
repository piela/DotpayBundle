<?php

namespace SymfonyCollection\DotpayBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SymfonyCollection\DotpayBundle\Entity\ErrorCode;

class ErrorCodeFixture implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach($this->errorCodes() as $name) {
            $manager->persist(
                (new ErrorCode())->setName($name)
            );
        }
        $manager->flush();
    }

    /**
     * @return array
     */
    private function errorCodes()
    {
        return [
            'PAYMENT_EXPIRED',
            'UNKNOWN_CHANNEL',
            'DISABLED_CHANNEL',
            'BLOCKED_ACCOUNT',
            'INACTIVE_SELLER',
            'AMOUNT_TOO_HIGH',
            'BAD_DATA_FORMAT'
        ];
    }
}