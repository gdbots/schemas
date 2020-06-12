<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Iam\Enum;

use Gdbots\Pbj\Enum;

/**
 * @method static SearchAppsSort UNKNOWN()
 * @method static SearchAppsSort RELEVANCE()
 * @method static SearchAppsSort CREATED_AT_ASC()
 * @method static SearchAppsSort CREATED_AT_DESC()
 * @method static SearchAppsSort UPDATED_AT_ASC()
 * @method static SearchAppsSort UPDATED_AT_DESC()
 * @method static SearchAppsSort TITLE_ASC()
 * @method static SearchAppsSort TITLE_DESC()
 */
final class SearchAppsSort extends Enum
{
    const UNKNOWN = 'unknown';
    const RELEVANCE = 'relevance';
    const CREATED_AT_ASC = 'created-at-asc';
    const CREATED_AT_DESC = 'created-at-desc';
    const UPDATED_AT_ASC = 'updated-at-asc';
    const UPDATED_AT_DESC = 'updated-at-desc';
    const TITLE_ASC = 'title-asc';
    const TITLE_DESC = 'title-desc';
}
