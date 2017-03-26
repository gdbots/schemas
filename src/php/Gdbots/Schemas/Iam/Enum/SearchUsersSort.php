<?php

namespace Gdbots\Schemas\Iam\Enum;

use Gdbots\Common\Enum;

/**
 * @method static SearchUsersSort UNKNOWN()
 * @method static SearchUsersSort RELEVANCE()
 * @method static SearchUsersSort CREATED_AT_DESC()
 * @method static SearchUsersSort CREATED_AT_ASC()
 * @method static SearchUsersSort UPDATED_AT_DESC()
 * @method static SearchUsersSort UPDATED_AT_ASC()
 * @method static SearchUsersSort FIRST_NAME_DESC()
 * @method static SearchUsersSort FIRST_NAME_ASC()
 * @method static SearchUsersSort LAST_NAME_DESC()
 * @method static SearchUsersSort LAST_NAME_ASC()
 */
final class SearchUsersSort extends Enum
{
    const UNKNOWN = 'unknown';
    const RELEVANCE = 'relevance';
    const CREATED_AT_DESC = 'created-at-desc';
    const CREATED_AT_ASC = 'created-at-asc';
    const UPDATED_AT_DESC = 'updated-at-desc';
    const UPDATED_AT_ASC = 'updated-at-asc';
    const FIRST_NAME_DESC = 'first-name-desc';
    const FIRST_NAME_ASC = 'first-name-asc';
    const LAST_NAME_DESC = 'last-name-desc';
    const LAST_NAME_ASC = 'last-name-asc';
}
