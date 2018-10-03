<?php
// @link http://schemas.gdbots.io/json-schema/gdbots/iam/mixin/email-app/1-0-1.json#
namespace Gdbots\Schemas\Iam\Mixin\EmailApp;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class EmailAppV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:gdbots:iam:mixin:email-app:1-0-1');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            /*
             * This field contains an access token (used as bearer token) and
             * in some cases SMTP username and password. It should be encrypted.
             * @link https://sendgrid.com/docs/ui/account-and-settings/api-keys/
             */
            Fb::create('sendgrid_api_key', T\TextType::create())
                ->build(),
            /*
             * keys are emails, e.g. "sender-email@tmz.com".
             * used to lookup the sendgrid sender Ids needed when posting to their API.
             */
            Fb::create('sendgrid_senders', T\IntType::create())
                ->asAMap()
                ->build(),
            /*
             * keys are list slugs, e.g. "newsletter-subscribers".
             * used to lookup the sendgrid list Ids needed when posting to their API.
             */
            Fb::create('sendgrid_lists', T\IntType::create())
                ->asAMap()
                ->build(),
            /*
             * also called as unsubscribe list ID, sendgrid specifically calls this list as suppression list
             */
            Fb::create('sendgrid_suppression_group_id', T\IntType::create())
                ->build(),
        ];
    }
}
