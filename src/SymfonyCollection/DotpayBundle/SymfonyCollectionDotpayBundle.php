<?php

namespace SymfonyCollection\DotpayBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use SymfonyCollection\DotpayBundle\DependencyInjection\Compiler\CredentialsCompilerPass;
use SymfonyCollection\DotpayBundle\DependencyInjection\Compiler\CheckSumValidatorCompilerPass;

class SymfonyCollectionDotpayBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new CredentialsCompilerPass());
        $container->addCompilerPass(new CheckSumValidatorCompilerPass());
    }
}