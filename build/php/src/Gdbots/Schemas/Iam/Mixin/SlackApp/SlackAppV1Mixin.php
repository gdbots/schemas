<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/slack-app/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\SlackApp;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\SchemaId;

final class SlackAppV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:iam:mixin:slack-app:1-0-0';
    const SCHEMA_CURIE = 'gdbots:iam:mixin:slack-app';
    const SCHEMA_CURIE_MAJOR = 'gdbots:iam:mixin:slack-app:v1';

    const FIELDS = [];

    final private function __construct() {}

    public static function getId(): SchemaId
    {
        return SchemaId::fromString(self::SCHEMA_ID);
    }

    public static function hasField(string $name): bool
    {
        return in_array($name, self::FIELDS, true);
    }

    /**
     * @return Field[]
     */
    public static function getFields(): array
    {
        return [];
    }
}
