<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('slugify_string')) {

    /**
     * Slugify a string
     *
     * Generate a human-readable specified string
     *
     * @param int $string
     * @return string
     */
    function slugify_string($string)
    {
        $CI = & get_instance();

        $CI->load->helper('text');
        $CI->load->helper('url');

        return url_title(convert_accented_characters($string), '-', true);
    }
}

if (!function_exists('format_thousands_number')) {

    /**
     * Thousands number formatter
     *
     * Format a number to nearest thousands
     *
     * @param int $number
     * @param string $separator [optional]
     * @return int
     */
    function format_thousands_number($number, $separator = '.')
    {
        if ($number > 1000) {
            $x_thousand_sep = $separator === '.' ? ',' : '.';
            $x_round = round($number);
            $x_number_format = number_format($x_round, 0, '', $x_thousand_sep);
            $x_array = explode($x_thousand_sep, $x_number_format);
            $x_parts = ['mil', 'milhões', 'bilhões', 'trilhões'];
            $x_count_parts = count($x_array) - 1;
            $x_display = $x_round;
            $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? ($separator . $x_array[1][0]) : '');
            $x_display .= $x_parts[$x_count_parts - 1];

            return $x_display;
        }

        return $number;
    }
}
