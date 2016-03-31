<?php

namespace SymfonyCollection\DotpayBundle\Validation\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class OperationStatusChangedConstraint extends Constraint
{
    public $message = 'The status of the operation can not be changed';

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }

    public function validatedBy()
    {
        return 'dotpay.validation.operation_status_changed';
    }
}