<?php

namespace SymfonyCollection\DotpayBundle\Validation\Validators;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use SymfonyCollection\DotpayBundle\Entity\OperationStatus;
use SymfonyCollection\DotpayBundle\Entity\PaymentStatus;

/**
 * @package SymfonyCollection\DotpayBundle\Validation
 */
class OperationStatusChangedValidator extends ConstraintValidator
{

    /**
     * @var EntityManager
     */
    private $manager;

    /**
     * @param EntityManager $manager
     */
    public function __construct(EntityManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param PaymentStatus $operationStatus
     * @param Constraint $constraint
     */
    public function validate($paymentStatus, Constraint $constraint)
    {
        if (!$this->validateOperationStatusChange($paymentStatus->getOperationStatus())) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }

    /**
     * @param OperationStatus $status
     * @param string $newStatus
     * @return bool
     */
    private function validateOperationStatusChange(OperationStatus $status)
    {


        $oldStatus = $this->manager->find(OperationStatus::class, $status->getId())->getName();
        dump($this->manager->getUnitOfWork()->getEntityChangeSet($this->manager->find(OperationStatus::class, $status->getId())));
        dump($status);
        dump($this->manager->find(OperationStatus::class, $status->getId()));

        return ! (($status === 'completed' || $status === 'rejected') && $status->getName() !== $oldStatus);
    }

}