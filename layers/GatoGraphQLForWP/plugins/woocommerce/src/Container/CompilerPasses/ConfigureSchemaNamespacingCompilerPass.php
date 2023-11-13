<?php

declare(strict_types=1);

namespace CapongaMaronga55\Woocommerce\Container\CompilerPasses;

use GatoGraphQL\GatoGraphQL\Container\CompilerPasses\AbstractConfigureSchemaNamespacingCompilerPass;
use PoP\Root\Module\ModuleInterface;

class ConfigureSchemaNamespacingCompilerPass extends AbstractConfigureSchemaNamespacingCompilerPass
{
    protected function getSchemaNamespace(): string
    {
        return 'CapongaMaronga55';
    }

    /**
     * @return array<class-string<ModuleInterface>>
     */
    protected function getModuleClasses(): array
    {
        return [
            \CapongaMaronga55\WoocommerceSchema\Module::class,
        ];
    }
}
