<?php

use Carbon\Carbon;

/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('convertYmdToMdy')) {
    function convertYmdToMdy($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
    }
}

/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('convertMdyToYmd')) {
    function convertMdyToYmd($date)
    {
        return Carbon::createFromFormat('m-d-Y', $date)->format('Y-m-d');
    }
}

if (! function_exists('slugify')) {
    /**
     * Slugifies a string by removing uppercase letters and replacing spaces with underscores.
     *
     * @param string $text The text to slugify.
     * @return string The slugified text.
     */
    function slugify(string $text): string
    {
        // Remove uppercase letters
        $text = Str::lower($text);

        // Replace spaces with underscores
        $text = Str::replace(' ', '_', $text);

        return $text;
    }
}
