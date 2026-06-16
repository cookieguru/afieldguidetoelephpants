<?php

namespace AFieldGuideToElephpants\JsonBundle\DependencyInjection;

use AFieldGuideToElephpants\JsonBundle\JsonBuilder;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Reference;

class JsonExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $container
            ->register(JsonBuilder::BUNDLE_NAME, JsonBuilder::class)
            ->addArgument(new Reference('sculpin.site_configuration'))
            ->addTag('kernel.event_listener', [
                'event' => 'sculpin.core.after_format',
                'method' => 'onSculpinCoreAfterFormat',
            ]);
    }
}
