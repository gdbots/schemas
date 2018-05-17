<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/list-all-apps-response/1-0-0.json#
namespace Gdbots\Schemas\Iam\Mixin\ListAllAppsResponse;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\NodeRef;

final class ListAllAppsResponseV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:list-all-apps-response:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('apps', T\IdentifierType::create())
                ->asASet()
                ->className(NodeRef::class)
                ->build(),
        ];
    }
}
