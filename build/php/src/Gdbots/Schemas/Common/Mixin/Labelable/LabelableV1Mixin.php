<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/common/mixin/labelable/1-0-0.json#
namespace Gdbots\Schemas\Common\Mixin\Labelable;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class LabelableV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:common:mixin:labelable:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            /*
             * A set of strings used for categorization or workflow.
             * Similar to slack channels, github or gmail labels.
             */
            Fb::create('labels', T\StringType::create())
                ->asASet()
                ->pattern('^[\w-]+$')
                ->build(),
        ];
    }
}
