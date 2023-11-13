<?php

declare(strict_types=1);

namespace CapongaMaronga55\AgainNathanBro\ModuleResolvers;

use CapongaMaronga55\AgainNathanBro\GatoGraphQLExtension;
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

    public final const SCHEMA_AGAIN_NATHAN_BRO = GatoGraphQLExtension::NAMESPACE . '\schema-again-nathan-bro';

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
            self::SCHEMA_AGAIN_NATHAN_BRO,
        ];
    }

    /**
     * @return DependedOnActiveWordPressPlugin[]
     */
    public function getDependentOnActiveWordPressPlugins(string $module): array
    {
        $requiredPluginName = __('Integration Plugin Template', 'gatographql-again-nathan-bro');
        $requiredPluginFile = '';
        $requiredPluginVersion = '*';
        return match ($module) {
            self::SCHEMA_AGAIN_NATHAN_BRO => $requiredPluginFile !== '' ? [
                /**
                 * @gatographql-extension-info
                 *
                 * If the extension is an integration for some plugin (eg: WooCommerce,
                 * Yoast SEO or, in this case, Again Nathan Bro), add below:
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
            self::SCHEMA_AGAIN_NATHAN_BRO => \__('Again Nathan Bro Schema', 'gatographql-again-nathan-bro'),
            default => $module,
        };
    }

    public function getDescription(string $module): string
    {
        return match ($module) {
            self::SCHEMA_AGAIN_NATHAN_BRO => \__('Add schema elements for the Again Nathan Bro extension for Gato GraphQL.', 'gatographql-again-nathan-bro'),
            default => parent::getDescription($module),
        };
    }
}
