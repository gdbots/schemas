<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/common/mixin/labelable/1-0-0.json#
namespace Gdbots\Schemas\Common\Mixin\Labelable;

use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class LabelableV1Mixin
{
    const SCHEMA_ID = 'pbj:gdbots:common:mixin:labelable:1-0-0';
    const SCHEMA_CURIE = 'gdbots:common:mixin:labelable';
    const SCHEMA_CURIE_MAJOR = 'gdbots:common:mixin:labelable:v1';

    const LABELS_FIELD = 'labels';

    const FIELDS = [
      self::LABELS_FIELD,
    ];

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
        return [
            /*
             * Labels is a list that categorizes data or tracks references in
             * external systems.
             */
            Fb::create(self::LABELS_FIELD, T\StringType::create())
                ->asAList()
                ->build(),
        ];
    }
}
