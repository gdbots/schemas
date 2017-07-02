import Enum from '@gdbots/common/Enum';

export default class Tracker extends Enum {
}

Tracker.configure({
  UNKNOWN: 'unknown',
  CUSTOM: 'custom',
  AKAMAI_MEDIA_ANALYTICS: 'akamai_ma',
  AWS_CLOUD_WATCH: 'aws_cw',
  AWS_MOBILE_ANALYTICS: 'aws_ma',
  CRASHLYTICS: 'crashlytics',
  GOOGLE_ANALYTICS: 'ga',
  FLURRY: 'flurry',
  IRIS: 'iris',
  KALTURA: 'kaltura',
  KEEN: 'keen',
  MIXPANEL: 'mixpanel',
  OMNITURE: 'omniture',
  SEGMENT: 'segment',
  SNOWPLOW: 'snowplow',
}, 'gdbots:analytics:tracker');
