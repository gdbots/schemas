<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/forms/mixin/get-upload-url-request/1-0-0.json#
namespace Gdbots\Schemas\Forms\Mixin\GetUploadUrlRequest;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\NodeRef;

final class GetUploadUrlRequestV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:forms:mixin:get-upload-url-request:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            Fb::create('form_ref', T\IdentifierType::create())
                ->required()
                ->className(NodeRef::class)
                ->build(),
            /*
             * A unique identifier (within the form) for the field.
             */
            Fb::create('field_name', T\StringType::create())
                ->required()
                ->maxLength(127)
                ->pattern('^[a-zA-Z_]{1}[\w-]*$')
                ->build(),
            Fb::create('client_file_name', T\StringType::create())
                ->required()
                ->build(),
        ];
    }
}
