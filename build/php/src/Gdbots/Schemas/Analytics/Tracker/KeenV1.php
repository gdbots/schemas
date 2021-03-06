<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/analytics/tracker/keen/1-0-0.json#
namespace Gdbots\Schemas\Analytics\Tracker;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Pbj\WellKnown\MessageRef;

final class KeenV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:analytics:tracker:keen:1-0-0';
    const SCHEMA_CURIE = 'gdbots:analytics:tracker:keen';
    const SCHEMA_CURIE_MAJOR = 'gdbots:analytics:tracker:keen:v1';
    const MIXINS = [
      'gdbots:analytics:mixin:tracker:v1',
      'gdbots:analytics:mixin:tracker',
    ];

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create('is_enabled', T\BooleanType::create())
                    ->build(),
                Fb::create('project_id', T\StringType::create())
                    ->pattern('^\w+$')
                    ->build(),
                Fb::create('read_key', T\StringType::create())
                    ->pattern('^\w+$')
                    ->build(),
                Fb::create('write_key', T\StringType::create())
                    ->pattern('^\w+$')
                    ->build(),
            ],
            self::MIXINS
        );
    }

    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(self::schema()->getCurie(), $this->fget('project_id'), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'project_id' => $this->fget('project_id'),
            'read_key' => $this->fget('read_key'),
            'write_key' => $this->fget('write_key'),
        ];
    }
}
