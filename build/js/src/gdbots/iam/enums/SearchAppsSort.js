import Enum from '@gdbots/pbj/Enum';

export default class SearchAppsSort extends Enum {
}

SearchAppsSort.configure({
  UNKNOWN: 'unknown',
  RELEVANCE: 'relevance',
  CREATED_AT_ASC: 'created-at-asc',
  CREATED_AT_DESC: 'created-at-desc',
  UPDATED_AT_ASC: 'updated-at-asc',
  UPDATED_AT_DESC: 'updated-at-desc',
  TITLE_ASC: 'title-asc',
  TITLE_DESC: 'title-desc',
}, 'gdbots:iam:search-apps-sort');
