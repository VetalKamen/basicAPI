<?php

require_once 'vendor/autoload.php';

/**
 * TheCatAPI endpoint and API key.
 */
const THE_CAT_API_ENDPOINT = 'https://api.thecatapi.com/v1/';
const THE_CAT_API_KEY      = 'b199af59-f7cb-4307-95ed-7b7f934c16ed';

function is_valid_value($value = '')
{
    if ( ! empty($param) && is_string($param) && ! empty($value)) {
        return true;
    }

    return false;
}