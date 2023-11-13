<?php

declare(strict_types=1);

namespace CapongaMaronga55\AgainNathanBro;

use CapongaMaronga55\AgainNathanBro\ModuleResolvers\SchemaTypeModuleResolver;
use GatoGraphQL\GatoGraphQL\PluginSkeleton\AbstractExtensionInitializationConfiguration;
use PoP\Root\Module\ModuleInterface;

class ExtensionInitializationConfiguration extends AbstractExtensionInitializationConfiguration
{
    /**
     * Provide the list of modules to check if they are enabled and,
     * if they are not, what component classes must skip initialization
     *
     * @return array<string,array<class-string<ModuleInterface>>>
     */
    protected function getModuleClassesToSkipIfModuleDisabled(): array
    {
        return [
            SchemaTypeModuleResolver::SCHEMA_AGAIN_NATHAN_BRO => [
                \CapongaMaronga55\AgainNathanBroSchema\Module::class,
            ],
        ];
    }
}
