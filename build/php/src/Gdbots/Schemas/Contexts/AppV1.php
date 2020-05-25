<?php
declare(strict_types=1);

// @link http://schemas.gdbots.io/json-schema/gdbots/contexts/app/1-0-0.json#
namespace Gdbots\Schemas\Contexts;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Pbj\WellKnown\MessageRef;

final class AppV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:gdbots:contexts::app:1-0-0';
    const SCHEMA_CURIE = 'gdbots:contexts::app';
    const SCHEMA_CURIE_MAJOR = 'gdbots:contexts::app:v1';

    const MIXINS = [];

    const _ID_FIELD = '_id';
    const VENDOR_FIELD = 'vendor';
    const NAME_FIELD = 'name';
    const VERSION_FIELD = 'version';
    const BUILD_FIELD = 'build';
    const VARIANT_FIELD = 'variant';

    const FIELDS = [
      self::_ID_FIELD,
      self::VENDOR_FIELD,
      self::NAME_FIELD,
      self::VERSION_FIELD,
      self::BUILD_FIELD,
      self::VARIANT_FIELD,
    ];

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create(self::_ID_FIELD, T\UuidType::create())
                    ->useTypeDefault(false)
                    ->build(),
                Fb::create(self::VENDOR_FIELD, T\StringType::create())
                    ->maxLength(50)
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                Fb::create(self::NAME_FIELD, T\StringType::create())
                    ->maxLength(50)
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                Fb::create(self::VERSION_FIELD, T\StringType::create())
                    ->maxLength(20)
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                Fb::create(self::BUILD_FIELD, T\StringType::create())
                    ->maxLength(50)
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                Fb::create(self::VARIANT_FIELD, T\StringType::create())
                    ->maxLength(20)
                    ->pattern('^[\w\.-]+$')
                    ->build(),
            ],
            self::MIXINS
        );
    }

    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(static::schema()->getCurie(), $this->fget('_id') ?: $this->generateEtag(), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
          '_id' => $this->fget('_id'),
          'vendor' => $this->fget('vendor'),
          'name' => $this->fget('name'),
          'version' => $this->fget('version'),
          'build' => $this->fget('build'),
          'variant' => $this->fget('variant'),
        ];
    }
}
