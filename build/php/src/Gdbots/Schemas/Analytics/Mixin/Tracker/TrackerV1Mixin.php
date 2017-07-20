<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/analytics/mixin/tracker/1-0-0.json#
namespace Gdbots\Schemas\Analytics\Mixin\Tracker;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class TrackerV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:analytics:mixin:tracker:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('is_enabled', T\BooleanType::create())
                ->build(),
        ];
    }
}
