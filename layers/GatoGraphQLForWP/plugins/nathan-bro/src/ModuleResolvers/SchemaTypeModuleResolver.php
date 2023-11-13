<?php

declare(strict_types=1);

namespace CapongaMaronga55\NathanBro\ModuleResolvers;

use CapongaMaronga55\NathanBro\GatoGraphQLExtension;
use GatoGraphQL\GatoGraphQL\ContentProcessors\MarkdownContentParserInterface;
use GatoGraphQL\GatoGraphQL\ModuleResolvers\AbstractModuleResolver;
use GatoGraphQL\GatoGraphQL\ModuleResolvers\SchemaTypeModuleResolverTrait;
use GatoGraphQL\GatoGraphQL\ObjectModels\DependedOnActiveWordPressPlugin;

class SchemaTypeModuleResolver extends AbstractModuleResolver
{
    use ModuleResolverTrait;
    use SchemaTypeModuleResolverTrait {
        SchemaTypeModuleResolverTrait::getPriority as getUpstreamPriority;
    }

    public final const SCHEMA_NATHAN_BRO = GatoGraphQLExtension::NAMESPACE . '\schema-nathan-bro';

    private ?MarkdownContentParserInterface $markdownContentParser = null;

    final protected function getMarkdownContentParser(): MarkdownContentParserInterface
    {
        if ($this->markdownContentParser === null) {
            /** @var MarkdownContentParserInterface */
            $markdownContentParser = $this->instanceManager->getInstance(MarkdownContentParserInterface::class);
            $this->markdownContentParser = $markdownContentParser;
        }
        return $this->markdownContentParser;
    }

    /**
     * @return string[]
     */
    public function getModulesToResolve(): array
    {
        return [
            self::SCHEMA_NATHAN_BRO,
        ];
    }

    /**
     * @return DependedOnActiveWordPressPlugin[]
     */
    public function getDependentOnActiveWordPressPlugins(string $module): array
    {
        $requiredPluginName = __('Integration Plugin Template', 'gatographql-nathan-bro');
        $requiredPluginFile = '';
        $requiredPluginVersion = '*';
        return match ($module) {
            self::SCHEMA_NATHAN_BRO => $requiredPluginFile !== '' ? [
                /**
                 * @gatographql-extension-info
                 *
                 * If the extension is an integration for some plugin (eg: WooCommerce,
                 * Yoast SEO or, in this case, Nathan Bro), add below:
                 *
                 * - the plugin's name
                 * - the plugin's main file
                 * - the minimum required version (via a Composer version constraint)
                 */
                new DependedOnActiveWordPressPlugin(
                    $requiredPluginName,
                    $requiredPluginFile,
                    $requiredPluginVersion,
                ),
            ]
            /** @phpstan-ignore-next-line */
            : [],
            default => parent::getDependentOnActiveWordPressPlugins($module),
        };
    }

    public function getName(string $module): string
    {
        return match ($module) {
            self::SCHEMA_NATHAN_BRO => \__('Nathan Bro Schema', 'gatographql-nathan-bro'),
            default => $module,
        };
    }

    public function getDescription(string $module): string
    {
        return match ($module) {
            self::SCHEMA_NATHAN_BRO => \__('Add schema elements for the Nathan Bro extension for Gato GraphQL.', 'gatographql-nathan-bro'),
            default => parent::getDescription($module),
        };
    }
}
