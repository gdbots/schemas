<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/event/health-checked/1-0-0.json#
namespace Gdbots\Schemas\Pbjx\Event;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1 as GdbotsPbjxEventV1;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Mixin as GdbotsPbjxEventV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Trait as GdbotsPbjxEventV1Trait;

final class HealthCheckedV1 extends AbstractMessage implements
    HealthChecked,
    GdbotsPbjxEventV1
{
    use GdbotsPbjxEventV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:pbjx:event:health-checked:1-0-0', __CLASS__,
            [
                /*
                 * A random string that is copied from the "check-health" command and
                 * is later validated by whatever process initiated the health check.
                 */
                Fb::create('msg', T\StringType::create())
                    ->build(),
            ],
            [
                GdbotsPbjxEventV1Mixin::create(),
            ]
        );
    }
}
