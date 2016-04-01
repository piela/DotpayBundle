<?php

namespace SymfonyCollection\DotpayBundle\Validation\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class CheckSumConstraint extends Constraint
{
    public $message = 'The checksum of the operation number \'%number%\' is invalid';

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }

    public function validatedBy() {
        return 'dotpay.validation.response_checksum';
    }
}