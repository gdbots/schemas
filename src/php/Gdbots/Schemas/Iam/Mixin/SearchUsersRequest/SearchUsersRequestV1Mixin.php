<?php

namespace Gdbots\Schemas\Iam\Mixin\SearchUsersRequest;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Iam\Enum\SearchSort;

final class SearchUsersRequestV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:search-users-request:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('sort', T\StringEnumType::create())
                ->withDefault(SearchSort::RELEVANCE())
                ->className('Gdbots\Schemas\Iam\Enum\SearchSort')
                ->build(),
            Fb::create('is_staff', T\TrinaryType::create())
                ->build(),
            Fb::create('is_blocked', T\TrinaryType::create())
                ->withDefault(2)
                ->build()
        ];
    }
}
