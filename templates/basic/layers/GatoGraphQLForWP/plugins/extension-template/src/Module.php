<?php

declare(strict_types=1);

namespace MyCompanyForGatoGraphQL\ExtensionTemplate;

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
            \MyCompanyForGatoGraphQL\ExtensionTemplateSchema\Module::class,
        ];
    }
}
