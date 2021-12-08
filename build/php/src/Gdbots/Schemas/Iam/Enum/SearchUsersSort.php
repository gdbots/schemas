<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Iam\Enum;

enum SearchUsersSort: string
{
    case UNKNOWN = 'unknown';
    case RELEVANCE = 'relevance';
    case CREATED_AT_DESC = 'created-at-desc';
    case CREATED_AT_ASC = 'created-at-asc';
    case UPDATED_AT_DESC = 'updated-at-desc';
    case UPDATED_AT_ASC = 'updated-at-asc';
    case FIRST_NAME_DESC = 'first-name-desc';
    case FIRST_NAME_ASC = 'first-name-asc';
    case LAST_NAME_DESC = 'last-name-desc';
    case LAST_NAME_ASC = 'last-name-asc';
}
