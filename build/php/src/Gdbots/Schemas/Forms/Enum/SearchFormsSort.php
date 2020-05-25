<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Forms\Enum;

use Gdbots\Pbj\Enum;

/**
 * @method static SearchFormsSort UNKNOWN()
 * @method static SearchFormsSort RELEVANCE()
 * @method static SearchFormsSort CREATED_AT_DESC()
 * @method static SearchFormsSort CREATED_AT_ASC()
 * @method static SearchFormsSort UPDATED_AT_DESC()
 * @method static SearchFormsSort UPDATED_AT_ASC()
 * @method static SearchFormsSort TITLE_DESC()
 * @method static SearchFormsSort TITLE_ASC()
 */
final class SearchFormsSort extends Enum
{
    const UNKNOWN = 'unknown';
    const RELEVANCE = 'relevance';
    const CREATED_AT_DESC = 'created-at-desc';
    const CREATED_AT_ASC = 'created-at-asc';
    const UPDATED_AT_DESC = 'updated-at-desc';
    const UPDATED_AT_ASC = 'updated-at-asc';
    const TITLE_DESC = 'title-desc';
    const TITLE_ASC = 'title-asc';
}
