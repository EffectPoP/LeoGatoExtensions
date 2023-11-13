<?php

declare(strict_types=1);

namespace CapongaMaronga55\AgainNathanBro;

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
            \CapongaMaronga55\AgainNathanBroSchema\Module::class,
        ];
    }
}
