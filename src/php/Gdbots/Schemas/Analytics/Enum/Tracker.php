<?php

namespace Gdbots\Schemas\Analytics\Enum;

use Gdbots\Common\Enum;

/**
 * @method static Tracker UNKNOWN()
 * @method static Tracker CUSTOM()
 * @method static Tracker AKAMAI_MEDIA_ANALYTICS()
 * @method static Tracker AWS_CLOUD_WATCH()
 * @method static Tracker AWS_MOBILE_ANALYTICS()
 * @method static Tracker CRASHLYTICS()
 * @method static Tracker GOOGLE_ANALYTICS()
 * @method static Tracker FLURRY()
 * @method static Tracker IRIS()
 * @method static Tracker KALTURA()
 * @method static Tracker KEEN()
 * @method static Tracker MIXPANEL()
 * @method static Tracker OMNITURE()
 * @method static Tracker SEGMENT()
 * @method static Tracker SNOWPLOW()
 */
final class Tracker extends Enum
{
    const UNKNOWN = 'unknown';
    const CUSTOM = 'custom';
    const AKAMAI_MEDIA_ANALYTICS = 'akamai_ma';
    const AWS_CLOUD_WATCH = 'aws_cw';
    const AWS_MOBILE_ANALYTICS = 'aws_ma';
    const CRASHLYTICS = 'crashlytics';
    const GOOGLE_ANALYTICS = 'ga';
    const FLURRY = 'flurry';
    const IRIS = 'iris';
    const KALTURA = 'kaltura';
    const KEEN = 'keen';
    const MIXPANEL = 'mixpanel';
    const OMNITURE = 'omniture';
    const SEGMENT = 'segment';
    const SNOWPLOW = 'snowplow';
}
