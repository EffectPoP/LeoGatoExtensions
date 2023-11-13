<?php

declare(strict_types=1);

namespace CapongaMaronga55\NathanBro\ContentProcessors;

use CapongaMaronga55\NathanBro\GatoGraphQLExtension;
use GatoGraphQL\GatoGraphQL\ContentProcessors\ExtensionMarkdownContentRetrieverTrait as UpstreamExtensionMarkdownContentRetrieverTrait;
use GatoGraphQL\GatoGraphQL\PluginSkeleton\ExtensionInterface;

trait ExtensionMarkdownContentRetrieverTrait
{
    use UpstreamExtensionMarkdownContentRetrieverTrait;

    /**
     * @return class-string<ExtensionInterface>
     */
    protected function getExtensionClass(): string
    {
        return GatoGraphQLExtension::class;
    }
}
