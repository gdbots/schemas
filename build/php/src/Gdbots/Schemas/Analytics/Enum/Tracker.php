<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Analytics\Enum;

enum Tracker: string
{
    case UNKNOWN = 'unknown';
    case CUSTOM = 'custom';
    case AKAMAI_MEDIA_ANALYTICS = 'akamai_ma';
    case AWS_CLOUD_WATCH = 'aws_cw';
    case AWS_MOBILE_ANALYTICS = 'aws_ma';
    case CRASHLYTICS = 'crashlytics';
    case GOOGLE_ANALYTICS = 'ga';
    case FLURRY = 'flurry';
    case IRIS = 'iris';
    case KALTURA = 'kaltura';
    case KEEN = 'keen';
    case MIXPANEL = 'mixpanel';
    case OMNITURE = 'omniture';
    case SEGMENT = 'segment';
    case SNOWPLOW = 'snowplow';
}
