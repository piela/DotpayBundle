<?php

namespace SymfonyCollection\DotpayBundle\Validation\Validators;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use SymfonyCollection\DotpayBundle\Credentials\EstablishedCredentials;
use SymfonyCollection\DotpayBundle\Entity\PaymentHistory;
use SymfonyCollection\DotpayBundle\Credentials\Credentials;

class CheckSumValidator extends ConstraintValidator
{
    private $provider;

    public function __construct(EstablishedCredentials $provider)
    {
        $this->provider = $provider;
    }

    public function validate($status, Constraint $constraint)
    {
        if (!$this->validateCheckSum($status, $this->provider->credentials())) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('%number%', $status->getOperationNumber())
                ->addViolation();
        }
    }

    private function validateCheckSum(PaymentHistory $status, Credentials $credentials)
    {
        return $status->getSignature() == hash('sha256', sprintf(
            '%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s',
            $credentials->pin(),
            $credentials->id(),
            $status->getOperationNumber(),
            $status->getOperationType() ? $status->getOperationType()->getName() : '',
            $status->getOperationStatus() ? $status->getOperationStatus()->getName() : '',
            $status->getOperationAmount(),
            $status->getOperationCurrency(),
            $status->getOperationWithdrawalAmount(),
            $status->getOperationCommissionAmount(),
            $status->getOperationOriginalAmount(),
            $status->getOperationOriginalCurrency(),
            $status->getOperationDatetime()->format('Y-m-d H:i:s'),
            $status->getOperationRelatedNumber(),
            $status->getControl(),
            $status->getDescription(),
            $status->getEmail(),
            $status->getPInfo(),
            $status->getPEmail(),
            $status->getChannel(),
            $status->getChannelCountry(),
            $status->getGeoipCountry()
        ));
    }

}