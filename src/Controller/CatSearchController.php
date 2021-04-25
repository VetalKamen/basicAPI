<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once dirname(dirname(__DIR__)) . '/functions.php';

class CatSearchController
{
    public function default_search($breed_id = '', $category_id = '', $filetype = '', $page = '')
    {
        $request = Request::createFromGlobals();

        $search_query = [
            'limit'        => 5,
            'breed_ids'    => is_valid_value($breed_id) ? $breed_id : '',
            'category_ids' => is_valid_value($category_id) ? $category_id : '',
            'mime_types'   => is_valid_value($filetype) ? $filetype : '',
            'page'         => is_valid_value($page) ? $page : '',
        ];
        $client       = new GuzzleHttp\Client([
            'base_uri' => THE_CAT_API_ENDPOINT,
            'headers'  => [
                'Accept'    => 'application/json',
                'x-api-key' => THE_CAT_API_KEY,
            ]
        ]);

        $resp = $client->get('images/search?' . http_build_query($search_query, '', '&'));

        $response = new Response($resp->getBody()->getContents());

        return [
            'request_encoding' => $request->getEncodings(),
            'request_path_info' => $request->getUri(),
            'request_accepted_content_types' => $request->getAcceptableContentTypes(),
            'request_method' => $request->getMethod(),
            'date'        => $response->getDate()->format("Y-m-d H:i:s"),
            'status_code' => $response->getStatusCode(),
            'content'     => $response->getContent(),
        ];
    }
}

$cat_search_controller = new CatSearchController();