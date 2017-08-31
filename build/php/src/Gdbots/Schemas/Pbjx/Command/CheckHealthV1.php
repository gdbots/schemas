<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/pbjx/command/check-health/1-0-0.json#
namespace Gdbots\Schemas\Pbjx\Command;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1 as GdbotsPbjxCommandV1;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Mixin as GdbotsPbjxCommandV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Trait as GdbotsPbjxCommandV1Trait;

final class CheckHealthV1 extends AbstractMessage implements
    CheckHealth,
    GdbotsPbjxCommandV1
{
    use GdbotsPbjxCommandV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:pbjx:command:check-health:1-0-0', __CLASS__,
            [
                /*
                 * A random string that will be validated to match after
                 * the event "health-checked" is triggered. (ping-pong)
                 */
                Fb::create('msg', T\StringType::create())
                    ->build(),
            ],
            [
                GdbotsPbjxCommandV1Mixin::create(),
            ]
        );
    }
}