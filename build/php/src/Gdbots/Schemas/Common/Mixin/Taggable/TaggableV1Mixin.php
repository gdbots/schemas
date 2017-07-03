<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/common/mixin/taggable/1-0-0.json#
namespace Gdbots\Schemas\Common\Mixin\Taggable;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class TaggableV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:common:mixin:taggable:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            /*
             * Tags is a map that categorizes data or tracks references in
             * external systems. The tags names should be consistent and descriptive,
             * e.g. fb_user_id:123, salesforce_customer_id:456.
             */
            Fb::create('tags', T\StringType::create())
                ->asAMap()
                ->pattern('^[\w\/\.:-]+$')
                ->build(),
        ];
    }
}
