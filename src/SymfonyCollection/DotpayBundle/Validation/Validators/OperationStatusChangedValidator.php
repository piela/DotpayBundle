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
        if (!$this->validateOperationStatusChange($paymentStatus)) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }

    /**
     * @param OperationStatus $status
     * @param string $newStatus
     * @return bool
     * @todo Ensure that operationStatus index exists - is it possible in stable release?
     */
    private function validateOperationStatusChange(PaymentStatus $paymentStatus)
    {
        $originalEntityData = $this->manager->getUnitOfWork()->getOriginalEntityData(
            $paymentStatus
        );
        $originalStatusName = $originalEntityData['operationStatus']->getName();
        $operationStatus = $paymentStatus->getOperationStatus()->getName();

        return ! (
            ($originalStatusName === 'completed' || $originalStatusName === 'rejected')
                && $originalStatusName !== $operationStatus
        );
    }

}