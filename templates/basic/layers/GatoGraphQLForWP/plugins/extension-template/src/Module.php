<?php

declare(strict_types=1);

namespace CapongaMaronga55\ExtensionTemplate;

use PoP\Root\Module\ModuleInterface;
use GatoGraphQL\GatoGraphQL\PluginSkeleton\AbstractExtensionModule;

class Module extends AbstractExtensionModule
{
    /**
     * @return array<class-string<ModuleInterface>>
     */
    public function getDependedModuleClasses(): array
    {
        return [
            \CapongaMaronga55\ExtensionTemplateSchema\Module::class,
        ];
    }
}
