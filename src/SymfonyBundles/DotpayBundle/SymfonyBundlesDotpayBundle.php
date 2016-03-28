<?php

namespace SymfonyBundles\DotpayBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use SymfonyBundles\DotpayBundle\DependencyInjection\CredentialsCompilerPass;
use SymfonyBundles\DotpayBundle\DependencyInjection\CheckSumValidatorCompilerPass;

class SymfonyBundlesDotpayBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new CredentialsCompilerPass());
        $container->addCompilerPass(new CheckSumValidatorCompilerPass());

    }
}
