<?php
declare(strict_types=1);

namespace Gdbots\Schemas\Pbjx\Enum;

use Gdbots\Pbj\Enum;

/**
 * @method static HttpCode UNKNOWN()
 * @method static HttpCode HTTP_CONTINUE()
 * @method static HttpCode HTTP_SWITCHING_PROTOCOLS()
 * @method static HttpCode HTTP_PROCESSING()
 * @method static HttpCode HTTP_OK()
 * @method static HttpCode HTTP_CREATED()
 * @method static HttpCode HTTP_ACCEPTED()
 * @method static HttpCode HTTP_NON_AUTHORITATIVE_INFORMATION()
 * @method static HttpCode HTTP_NO_CONTENT()
 * @method static HttpCode HTTP_RESET_CONTENT()
 * @method static HttpCode HTTP_PARTIAL_CONTENT()
 * @method static HttpCode HTTP_MULTI_STATUS()
 * @method static HttpCode HTTP_ALREADY_REPORTED()
 * @method static HttpCode HTTP_IM_USED()
 * @method static HttpCode HTTP_MULTIPLE_CHOICES()
 * @method static HttpCode HTTP_MOVED_PERMANENTLY()
 * @method static HttpCode HTTP_FOUND()
 * @method static HttpCode HTTP_SEE_OTHER()
 * @method static HttpCode HTTP_NOT_MODIFIED()
 * @method static HttpCode HTTP_USE_PROXY()
 * @method static HttpCode HTTP_RESERVED()
 * @method static HttpCode HTTP_TEMPORARY_REDIRECT()
 * @method static HttpCode HTTP_PERMANENTLY_REDIRECT()
 * @method static HttpCode HTTP_BAD_REQUEST()
 * @method static HttpCode HTTP_UNAUTHORIZED()
 * @method static HttpCode HTTP_PAYMENT_REQUIRED()
 * @method static HttpCode HTTP_FORBIDDEN()
 * @method static HttpCode HTTP_NOT_FOUND()
 * @method static HttpCode HTTP_METHOD_NOT_ALLOWED()
 * @method static HttpCode HTTP_NOT_ACCEPTABLE()
 * @method static HttpCode HTTP_PROXY_AUTHENTICATION_REQUIRED()
 * @method static HttpCode HTTP_REQUEST_TIMEOUT()
 * @method static HttpCode HTTP_CONFLICT()
 * @method static HttpCode HTTP_GONE()
 * @method static HttpCode HTTP_LENGTH_REQUIRED()
 * @method static HttpCode HTTP_PRECONDITION_FAILED()
 * @method static HttpCode HTTP_REQUEST_ENTITY_TOO_LARGE()
 * @method static HttpCode HTTP_REQUEST_URI_TOO_LONG()
 * @method static HttpCode HTTP_UNSUPPORTED_MEDIA_TYPE()
 * @method static HttpCode HTTP_REQUESTED_RANGE_NOT_SATISFIABLE()
 * @method static HttpCode HTTP_EXPECTATION_FAILED()
 * @method static HttpCode HTTP_I_AM_A_TEAPOT()
 * @method static HttpCode HTTP_UNPROCESSABLE_ENTITY()
 * @method static HttpCode HTTP_LOCKED()
 * @method static HttpCode HTTP_FAILED_DEPENDENCY()
 * @method static HttpCode HTTP_RESERVED_FOR_WEBDAV_ADVANCED_COLLECTIONS_EXPIRED_PROPOSAL()
 * @method static HttpCode HTTP_UPGRADE_REQUIRED()
 * @method static HttpCode HTTP_PRECONDITION_REQUIRED()
 * @method static HttpCode HTTP_TOO_MANY_REQUESTS()
 * @method static HttpCode HTTP_CLIENT_CLOSED_REQUEST()
 * @method static HttpCode HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE()
 * @method static HttpCode HTTP_UNAVAILABLE_FOR_LEGAL_REASONS()
 * @method static HttpCode HTTP_INTERNAL_SERVER_ERROR()
 * @method static HttpCode HTTP_NOT_IMPLEMENTED()
 * @method static HttpCode HTTP_BAD_GATEWAY()
 * @method static HttpCode HTTP_SERVICE_UNAVAILABLE()
 * @method static HttpCode HTTP_GATEWAY_TIMEOUT()
 * @method static HttpCode HTTP_VERSION_NOT_SUPPORTED()
 * @method static HttpCode HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL()
 * @method static HttpCode HTTP_INSUFFICIENT_STORAGE()
 * @method static HttpCode HTTP_LOOP_DETECTED()
 * @method static HttpCode HTTP_NOT_EXTENDED()
 * @method static HttpCode HTTP_NETWORK_AUTHENTICATION_REQUIRED()
 */
final class HttpCode extends Enum
{
    const UNKNOWN = 0;
    const HTTP_CONTINUE = 100;
    const HTTP_SWITCHING_PROTOCOLS = 101;
    const HTTP_PROCESSING = 102;
    const HTTP_OK = 200;
    const HTTP_CREATED = 201;
    const HTTP_ACCEPTED = 202;
    const HTTP_NON_AUTHORITATIVE_INFORMATION = 203;
    const HTTP_NO_CONTENT = 204;
    const HTTP_RESET_CONTENT = 205;
    const HTTP_PARTIAL_CONTENT = 206;
    const HTTP_MULTI_STATUS = 207;
    const HTTP_ALREADY_REPORTED = 208;
    const HTTP_IM_USED = 226;
    const HTTP_MULTIPLE_CHOICES = 300;
    const HTTP_MOVED_PERMANENTLY = 301;
    const HTTP_FOUND = 302;
    const HTTP_SEE_OTHER = 303;
    const HTTP_NOT_MODIFIED = 304;
    const HTTP_USE_PROXY = 305;
    const HTTP_RESERVED = 306;
    const HTTP_TEMPORARY_REDIRECT = 307;
    const HTTP_PERMANENTLY_REDIRECT = 308;
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
    const HTTP_I_AM_A_TEAPOT = 418;
    const HTTP_UNPROCESSABLE_ENTITY = 422;
    const HTTP_LOCKED = 423;
    const HTTP_FAILED_DEPENDENCY = 424;
    const HTTP_RESERVED_FOR_WEBDAV_ADVANCED_COLLECTIONS_EXPIRED_PROPOSAL = 425;
    const HTTP_UPGRADE_REQUIRED = 426;
    const HTTP_PRECONDITION_REQUIRED = 428;
    const HTTP_TOO_MANY_REQUESTS = 429;
    const HTTP_CLIENT_CLOSED_REQUEST = 499;
    const HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
    const HTTP_UNAVAILABLE_FOR_LEGAL_REASONS = 451;
    const HTTP_INTERNAL_SERVER_ERROR = 500;
    const HTTP_NOT_IMPLEMENTED = 501;
    const HTTP_BAD_GATEWAY = 502;
    const HTTP_SERVICE_UNAVAILABLE = 503;
    const HTTP_GATEWAY_TIMEOUT = 504;
    const HTTP_VERSION_NOT_SUPPORTED = 505;
    const HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL = 506;
    const HTTP_INSUFFICIENT_STORAGE = 507;
    const HTTP_LOOP_DETECTED = 508;
    const HTTP_NOT_EXTENDED = 510;
    const HTTP_NETWORK_AUTHENTICATION_REQUIRED = 511;
}
