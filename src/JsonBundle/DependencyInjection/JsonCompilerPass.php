<?php

namespace AFieldGuideToElephpants\JsonBundle\DependencyInjection;

use AFieldGuideToElephpants\JsonBundle\JsonBuilder;
use Sculpin\Core\Sculpin;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class JsonCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $container
            ->getDefinition('event_dispatcher')
            ->addMethodCall('addListener', [
                Sculpin::EVENT_AFTER_FORMAT,
                [new Reference(JsonBuilder::BUNDLE_NAME), 'onSculpinCoreAfterFormat']
            ]);
    }
}
