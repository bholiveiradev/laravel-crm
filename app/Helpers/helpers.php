<?php

if (!function_exists('numbersOnly')) {

    function numbersOnly(string $str = null)
    {
        if ($str)
            return preg_replace('/[^0-9]/', '', $str);
    }
}

if (!function_exists('phoneMask')) {

    function phoneMask(string $str = null)
    {
        if ($str) {
            if (strlen($str) === 11) {
                return '(' . substr($str, 0, 2) . ') '
                    . substr($str, 2, 1) . ' '
                    . substr($str, 3, 4) . '-'
                    . substr($str, 7, 4);
            }

            if (strlen($str) === 10) {
                return '(' . substr($str, 0, 2) . ') '
                    . substr($str, 2, 4) . '-'
                    . substr($str, 6, 4);
            }
        }
    }
}

if (!function_exists('getException')) {

    function getException($exception)
    {
        if (env('APP_DEBUG') === true) {
            return ['errors' => true, 'message' => $exception->getMessage()];
        }

        return ['errors' => true, 'message' => __('Request processing error')];
    }
}
