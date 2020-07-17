<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/common/search-filter/1-0-0.json#
namespace Gdbots\Schemas\Common;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Pbj\WellKnown\MessageRef;
use Gdbots\Schemas\Common\Enum\ComparisonOperator;

final class SearchFilterV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:common::search-filter:1-0-0';
    const SCHEMA_CURIE = 'gdbots:common::search-filter';
    const SCHEMA_CURIE_MAJOR = 'gdbots:common::search-filter:v1';

    const MIXINS = [];

    const NAME_FIELD = 'name';
    const OPERATOR_FIELD = 'operator';
    const BOOLS_FIELD = 'bools';
    const DATES_FIELD = 'dates';
    const FLOATS_FIELD = 'floats';
    const INTS_FIELD = 'ints';
    const STRINGS_FIELD = 'strings';

    const FIELDS = [
      self::NAME_FIELD,
      self::OPERATOR_FIELD,
      self::BOOLS_FIELD,
      self::DATES_FIELD,
      self::FLOATS_FIELD,
      self::INTS_FIELD,
      self::STRINGS_FIELD,
    ];

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create(self::NAME_FIELD, T\StringType::create())
                    ->required()
                    ->maxLength(127)
                    ->pattern('^[a-zA-Z_]{1}[\w-]*$')
                    ->build(),
                Fb::create(self::OPERATOR_FIELD, T\StringEnumType::create())
                    ->withDefault(ComparisonOperator::EQUAL_TO())
                    ->className(ComparisonOperator::class)
                    ->build(),
                Fb::create(self::BOOLS_FIELD, T\BooleanType::create())
                    ->asAList()
                    ->build(),
                Fb::create(self::DATES_FIELD, T\DateType::create())
                    ->asAList()
                    ->build(),
                Fb::create(self::FLOATS_FIELD, T\FloatType::create())
                    ->asAList()
                    ->build(),
                Fb::create(self::INTS_FIELD, T\IntType::create())
                    ->asAList()
                    ->build(),
                Fb::create(self::STRINGS_FIELD, T\StringType::create())
                    ->asAList()
                    ->build(),
            ],
            self::MIXINS
        );
    }

    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(static::schema()->getCurie(), $this->fget(self::NAME_FIELD), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'name' => $this->fget(self::NAME_FIELD),
        ];
    }
}
