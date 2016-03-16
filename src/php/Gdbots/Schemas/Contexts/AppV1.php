<?php

namespace Gdbots\Schemas\Contexts;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\MessageRef;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;

final class AppV1 extends AbstractMessage implements
    App
{

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:gdbots:contexts::app:1-0-0', __CLASS__,
            [
                Fb::create('_id', T\UuidType::create())
                    ->useTypeDefault(false)
                    ->build(),
                Fb::create('vendor', T\StringType::create())
                    ->maxLength(50)
                    ->pattern('^[a-z0-9-]+$')
                    ->build(),
                Fb::create('name', T\StringType::create())
                    ->maxLength(50)
                    ->pattern('^[a-z0-9\.-]+$')
                    ->build(),
                Fb::create('version', T\StringType::create())
                    ->maxLength(10)
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                Fb::create('build', T\StringType::create())
                    ->maxLength(50)
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                Fb::create('variant', T\StringType::create())
                    ->maxLength(10)
                    ->pattern('^[\w\.-]+$')
                    ->build()
            ]
        );
    }

    /**
     * @param string $tag
     * @return MessageRef
     */
    public function generateMessageRef($tag = null)
    {
        return new MessageRef(static::schema()->getCurie(), $this->get('_id'), $tag);
    }
    
    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return ['app_id' => (string)$this->get('_id')];
    }
}
