<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once dirname(dirname(__DIR__)) . '/functions.php';

class CatController
{
    public function listBreeds()
    {
        $request = Request::createFromGlobals();
        $client  = new GuzzleHttp\Client([
            'base_uri' => THE_CAT_API_ENDPOINT,
            'headers'  => [
                'Accept'    => 'application/json',
                'x-api-key' => THE_CAT_API_KEY,
            ]
        ]);
        $resp    = $client->get('breeds' . '?limit=7');

        $response = new Response($resp->getBody()->getContents());

        return [
            'request_encoding'               => $request->getEncodings(),
            'request_path_info'              => $request->getUri(),
            'request_accepted_content_types' => $request->getAcceptableContentTypes(),
            'request_method'                 => $request->getMethod(),
            'date'                           => $response->getDate()->format("Y-m-d H:i:s"),
            'status_code'                    => $response->getStatusCode(),
            'content'                        => $response->getContent(),
        ];
    }

    public function listCategories()
    {
        $request = Request::createFromGlobals();
        $client  = new GuzzleHttp\Client([
            'base_uri' => THE_CAT_API_ENDPOINT,
            'headers'  => [
                'Accept'    => 'application/json',
                'x-api-key' => THE_CAT_API_KEY,
            ]
        ]);
        $resp    = $client->get('categories' . '?limit=7');

        $response = new Response($resp->getBody()->getContents());

        return [
            'request_encoding'               => $request->getEncodings(),
            'request_path_info'              => $request->getUri(),
            'request_accepted_content_types' => $request->getAcceptableContentTypes(),
            'request_method'                 => $request->getMethod(),
            'date'                           => $response->getDate()->format("Y-m-d H:i:s"),
            'status_code'                    => $response->getStatusCode(),
            'content'                        => $response->getContent(),
        ];
    }
}

$cat_controller = new CatController();
