<?php

namespace Gdbots\Schemas\Pbjx\Enum;

use Gdbots\Common\Enum;

/**
 * @method static HttpStatusCode UNKNOWN()
 * @method static HttpStatusCode HTTP_CONTINUE()
 * @method static HttpStatusCode HTTP_SWITCHING_PROTOCOLS()
 * @method static HttpStatusCode HTTP_PROCESSING()
 * @method static HttpStatusCode HTTP_OK()
 * @method static HttpStatusCode HTTP_CREATED()
 * @method static HttpStatusCode HTTP_ACCEPTED()
 * @method static HttpStatusCode HTTP_NON_AUTHORITATIVE_INFORMATION()
 * @method static HttpStatusCode HTTP_NO_CONTENT()
 * @method static HttpStatusCode HTTP_RESET_CONTENT()
 * @method static HttpStatusCode HTTP_PARTIAL_CONTENT()
 * @method static HttpStatusCode HTTP_MULTI_STATUS()
 * @method static HttpStatusCode HTTP_ALREADY_REPORTED()
 * @method static HttpStatusCode HTTP_IM_USED()
 * @method static HttpStatusCode HTTP_MULTIPLE_CHOICES()
 * @method static HttpStatusCode HTTP_MOVED_PERMANENTLY()
 * @method static HttpStatusCode HTTP_FOUND()
 * @method static HttpStatusCode HTTP_SEE_OTHER()
 * @method static HttpStatusCode HTTP_NOT_MODIFIED()
 * @method static HttpStatusCode HTTP_USE_PROXY()
 * @method static HttpStatusCode HTTP_RESERVED()
 * @method static HttpStatusCode HTTP_TEMPORARY_REDIRECT()
 * @method static HttpStatusCode HTTP_PERMANENTLY_REDIRECT()
 * @method static HttpStatusCode HTTP_BAD_REQUEST()
 * @method static HttpStatusCode HTTP_UNAUTHORIZED()
 * @method static HttpStatusCode HTTP_PAYMENT_REQUIRED()
 * @method static HttpStatusCode HTTP_FORBIDDEN()
 * @method static HttpStatusCode HTTP_NOT_FOUND()
 * @method static HttpStatusCode HTTP_METHOD_NOT_ALLOWED()
 * @method static HttpStatusCode HTTP_NOT_ACCEPTABLE()
 * @method static HttpStatusCode HTTP_PROXY_AUTHENTICATION_REQUIRED()
 * @method static HttpStatusCode HTTP_REQUEST_TIMEOUT()
 * @method static HttpStatusCode HTTP_CONFLICT()
 * @method static HttpStatusCode HTTP_GONE()
 * @method static HttpStatusCode HTTP_LENGTH_REQUIRED()
 * @method static HttpStatusCode HTTP_PRECONDITION_FAILED()
 * @method static HttpStatusCode HTTP_REQUEST_ENTITY_TOO_LARGE()
 * @method static HttpStatusCode HTTP_REQUEST_URI_TOO_LONG()
 * @method static HttpStatusCode HTTP_UNSUPPORTED_MEDIA_TYPE()
 * @method static HttpStatusCode HTTP_REQUESTED_RANGE_NOT_SATISFIABLE()
 * @method static HttpStatusCode HTTP_EXPECTATION_FAILED()
 * @method static HttpStatusCode HTTP_I_AM_A_TEAPOT()
 * @method static HttpStatusCode HTTP_UNPROCESSABLE_ENTITY()
 * @method static HttpStatusCode HTTP_LOCKED()
 * @method static HttpStatusCode HTTP_FAILED_DEPENDENCY()
 * @method static HttpStatusCode HTTP_RESERVED_FOR_WEBDAV_ADVANCED_COLLECTIONS_EXPIRED_PROPOSAL()
 * @method static HttpStatusCode HTTP_UPGRADE_REQUIRED()
 * @method static HttpStatusCode HTTP_PRECONDITION_REQUIRED()
 * @method static HttpStatusCode HTTP_TOO_MANY_REQUESTS()
 * @method static HttpStatusCode HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE()
 * @method static HttpStatusCode HTTP_UNAVAILABLE_FOR_LEGAL_REASONS()
 * @method static HttpStatusCode HTTP_INTERNAL_SERVER_ERROR()
 * @method static HttpStatusCode HTTP_NOT_IMPLEMENTED()
 * @method static HttpStatusCode HTTP_BAD_GATEWAY()
 * @method static HttpStatusCode HTTP_SERVICE_UNAVAILABLE()
 * @method static HttpStatusCode HTTP_GATEWAY_TIMEOUT()
 * @method static HttpStatusCode HTTP_VERSION_NOT_SUPPORTED()
 * @method static HttpStatusCode HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL()
 * @method static HttpStatusCode HTTP_INSUFFICIENT_STORAGE()
 * @method static HttpStatusCode HTTP_LOOP_DETECTED()
 * @method static HttpStatusCode HTTP_NOT_EXTENDED()
 * @method static HttpStatusCode HTTP_NETWORK_AUTHENTICATION_REQUIRED()
 */
final class HttpStatusCode extends Enum
{
    const UNKNOWN = 0;
    const HTTP_CONTINUE = 100;
    const HTTP_SWITCHING_PROTOCOLS = 101;
    const HTTP_PROCESSING = 102;            // RFC2518
    const HTTP_OK = 200;
    const HTTP_CREATED = 201;
    const HTTP_ACCEPTED = 202;
    const HTTP_NON_AUTHORITATIVE_INFORMATION = 203;
    const HTTP_NO_CONTENT = 204;
    const HTTP_RESET_CONTENT = 205;
    const HTTP_PARTIAL_CONTENT = 206;
    const HTTP_MULTI_STATUS = 207;          // RFC4918
    const HTTP_ALREADY_REPORTED = 208;      // RFC5842
    const HTTP_IM_USED = 226;               // RFC3229
    const HTTP_MULTIPLE_CHOICES = 300;
    const HTTP_MOVED_PERMANENTLY = 301;
    const HTTP_FOUND = 302;
    const HTTP_SEE_OTHER = 303;
    const HTTP_NOT_MODIFIED = 304;
    const HTTP_USE_PROXY = 305;
    const HTTP_RESERVED = 306;
    const HTTP_TEMPORARY_REDIRECT = 307;
    const HTTP_PERMANENTLY_REDIRECT = 308;  // RFC7238
    const HTTP_BAD_REQUEST = 400;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_PAYMENT_REQUIRED = 402;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;
    const HTTP_METHOD_NOT_ALLOWED = 405;
    const HTTP_NOT_ACCEPTABLE = 406;
    const HTTP_PROXY_AUTHENTICATION_REQUIRED = 407;
    const HTTP_REQUEST_TIMEOUT = 408;
    const HTTP_CONFLICT = 409;
    const HTTP_GONE = 410;
    const HTTP_LENGTH_REQUIRED = 411;
    const HTTP_PRECONDITION_FAILED = 412;
    const HTTP_REQUEST_ENTITY_TOO_LARGE = 413;
    const HTTP_REQUEST_URI_TOO_LONG = 414;
    const HTTP_UNSUPPORTED_MEDIA_TYPE = 415;
    const HTTP_REQUESTED_RANGE_NOT_SATISFIABLE = 416;
    const HTTP_EXPECTATION_FAILED = 417;
    const HTTP_I_AM_A_TEAPOT = 418;                                               // RFC2324
    const HTTP_UNPROCESSABLE_ENTITY = 422;                                        // RFC4918
    const HTTP_LOCKED = 423;                                                      // RFC4918
    const HTTP_FAILED_DEPENDENCY = 424;                                           // RFC4918
    const HTTP_RESERVED_FOR_WEBDAV_ADVANCED_COLLECTIONS_EXPIRED_PROPOSAL = 425;   // RFC2817
    const HTTP_UPGRADE_REQUIRED = 426;                                            // RFC2817
    const HTTP_PRECONDITION_REQUIRED = 428;                                       // RFC6585
    const HTTP_TOO_MANY_REQUESTS = 429;                                           // RFC6585
    const HTTP_CLIENT_CLOSED_REQUEST = 499;
    const HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = 431;                             // RFC6585
    const HTTP_UNAVAILABLE_FOR_LEGAL_REASONS = 451;
    const HTTP_INTERNAL_SERVER_ERROR = 500;
    const HTTP_NOT_IMPLEMENTED = 501;
    const HTTP_BAD_GATEWAY = 502;
    const HTTP_SERVICE_UNAVAILABLE = 503;
    const HTTP_GATEWAY_TIMEOUT = 504;
    const HTTP_VERSION_NOT_SUPPORTED = 505;
    const HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL = 506;                        // RFC2295
    const HTTP_INSUFFICIENT_STORAGE = 507;                                        // RFC4918
    const HTTP_LOOP_DETECTED = 508;                                               // RFC5842
    const HTTP_NOT_EXTENDED = 510;                                                // RFC2774
    const HTTP_NETWORK_AUTHENTICATION_REQUIRED = 511;                             // RFC6585
}
