<?php

namespace SymfonyCollection\DotpayBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SymfonyCollection\DotpayBundle\Entity\OperationStatus;

class OperationStatusFixture implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach($this->operationStatuses() as $name) {
            $manager->persist(
                (new OperationStatus())->setName($name))
            ;
        }
        $manager->flush();
    }

    /**
     * @return array
     */
    private function operationStatuses()
    {
        return [
            'new',
            'processing',
            'completed',
            'rejected',
            'processing_realization_waiting',
            'processing_realization',
        ];
    }
}