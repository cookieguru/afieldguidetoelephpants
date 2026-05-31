<?php

namespace AFieldGuideToElephpants\JsonBundle;

use AFieldGuideToElephpants\JsonBundle\DependencyInjection\JsonCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class JsonBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new JsonCompilerPass());
    }
}
