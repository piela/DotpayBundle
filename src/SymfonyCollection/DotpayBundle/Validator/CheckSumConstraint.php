<?php

namespace SymfonyCollection\DotpayBundle\Validator;

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
        return 'dotpay_checksum_validator';
    }
}