<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/process-irr/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\ProcessIrr;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Forms\Enum\IrrType;

final class ProcessIrrV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:process-irr:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('type', T\StringEnumType::create())
                ->required()
                ->className(IrrType::class)
                ->build(),
            Fb::create('email', T\StringType::create())
                ->format(Format::EMAIL())
                ->build(),
        ];
    }
}
