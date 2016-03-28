<?php

namespace SymfonyBundles\DotpayBundle\Service;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use SymfonyBundles\DotpayBundle\Entity\PaymentStatus;

class CheckSumConstraintValidator extends ConstraintValidator
{
    private $provider;

    public function __construct(CredentialsProvider $provider)
    {
        $this->provider = $provider;
    }

    public function validate($status, Constraint $constraint)
    {
        if (!$this->validateCheckSum($status, $this->provider->provideCredentials())) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('%number%', $status->getOperationNumber())
                ->addViolation();
        }
    }

    private function validateCheckSum(PaymentStatus $status, Credentials $credentials)
    {
        return $status->getSignature() == hash('sha256', sprintf(
            '%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s',
            $credentials->pin(),
            $credentials->id(),
            $status->getOperationNumber(),
            $status->getOperationType(),
            $status->getOperationStatus(),
            $status->getOperationAmount(),
            $status->getOperationCurrency(),
            $status->getOperationWithdrawalAmount(),
            $status->getOperationCommissionAmount(),
            $status->getOperationOriginalAmount(),
            $status->getOperationOriginalCurrency(),
            $status->getOperationDatetime(),
            $status->getOperationRelatedNumber(),
            $status->getControl(),
            $status->getDescription(),
            $status->getEmail(),
            $status->getPInfo(),
            $status->getPEmail(),
            $status->getChannel(),
            $status->getChannel(),
            $status->getChannelCountry(),
            $status->getGeoipCountry()
        ));
    }

}