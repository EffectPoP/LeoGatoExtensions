<?php

declare(strict_types=1);

namespace CapongaMaronga55\Woocommerce;

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
            \CapongaMaronga55\WoocommerceSchema\Module::class,
        ];
    }
}
