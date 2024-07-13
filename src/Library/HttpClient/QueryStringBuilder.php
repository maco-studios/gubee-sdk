<?php

declare(strict_types=1);

namespace Gubee\SDK\Library\HttpClient;

use function array_keys;
use function array_map;
use function count;
use function implode;
use function is_array;
use function range;
use function rawurlencode;
use function sprintf;

class QueryStringBuilder
{
    /**
     * Encode a query as a query string according to RFC 3986.
     *
     * Indexed arrays are encoded using empty squared brackets ([]) unlike
     * `http_build_query`.
     *
     * @param array $query
     */
    public static function build(array $query): string
    {
        return sprintf('?%s', implode('&', array_map(function ($value, $key): string {
            return self::encode($value, $key);
        }, $query, array_keys($query))));
    }

    /**
     * Encode a value.
     *
     * @param mixed  $query
     * @param scalar $prefix
     */
    private static function encode($query, $prefix): string
    {
        if (! is_array($query)) {
            return self::rawurlencode($prefix) . '=' . self::rawurlencode($query);
        }

        $isList = self::isList($query);

        return implode('&', array_map(function ($value, $key) use ($prefix, $isList): string {
            $prefix = $isList ? $prefix . '[]' : $prefix . '[' . $key . ']';

            return self::encode($value, $prefix);
        }, $query, array_keys($query)));
    }

    /**
     * Tell if the given array is a list.
     *
     * @param array $query
     */
    private static function isList(array $query): bool
    {
        if (0 === count($query) || ! isset($query[0])) {
            return false;
        }

        return array_keys($query) === range(0, count($query) - 1);
    }

    /**
     * Encode a value like rawurlencode, but return "0" when false is given.
     *
     * @param mixed $value
     */
    private static function rawurlencode($value): string
    {
        if (false === $value) {
            return '0';
        }

        return rawurlencode((string) $value);
    }
}
