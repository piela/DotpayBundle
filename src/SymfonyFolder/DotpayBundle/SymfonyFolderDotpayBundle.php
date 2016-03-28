<?php

namespace SymfonyFolder\DotpayBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use SymfonyFolder\DotpayBundle\DependencyInjection\Compiler\CredentialsCompilerPass;
use SymfonyFolder\DotpayBundle\DependencyInjection\Compiler\CheckSumValidatorCompilerPass;

class SymfonyFolderDotpayBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new CredentialsCompilerPass());
        $container->addCompilerPass(new CheckSumValidatorCompilerPass());
    }
}
