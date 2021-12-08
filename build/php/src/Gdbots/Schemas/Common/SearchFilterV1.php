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

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create('name', T\StringType::create())
                    ->required()
                    ->maxLength(127)
                    ->pattern('^[a-zA-Z_]{1}[\w-]*$')
                    ->build(),
                Fb::create('operator', T\StringEnumType::create())
                    ->withDefault(ComparisonOperator::EQUAL_TO)
                    ->className(ComparisonOperator::class)
                    ->build(),
                Fb::create('booleans', T\BooleanType::create())
                    ->asAList()
                    ->build(),
                Fb::create('dates', T\DateType::create())
                    ->asAList()
                    ->build(),
                Fb::create('floats', T\FloatType::create())
                    ->asAList()
                    ->build(),
                Fb::create('ints', T\IntType::create())
                    ->asAList()
                    ->build(),
                Fb::create('strings', T\StringType::create())
                    ->asAList()
                    ->build(),
            ],
            self::MIXINS
        );
    }

    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(static::schema()->getCurie(), $this->fget('name'), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'name' => $this->fget('name'),
        ];
    }
}
