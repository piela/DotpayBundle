<?php

namespace SymfonyBundles\DotpayBundle\Service;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class CheckSumConstraint extends Constraint
{
    public $message = 'The checksum of the operation number \'%number%\' is invalid';

    public function validatedBy() {
        return 'dotpay_checksum_validator';
    }
}