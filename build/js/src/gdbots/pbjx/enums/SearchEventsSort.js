import Enum from '@gdbots/pbj/Enum.js';

export default class SearchEventsSort extends Enum {
}

SearchEventsSort.configure({
  UNKNOWN: 'unknown',
  RELEVANCE: 'relevance',
  DATE_DESC: 'date-desc',
  DATE_ASC: 'date-asc',
}, 'gdbots:pbjx:search-events-sort');
