<?php

namespace Viperxes\Client\Services;

use GuzzleHttp\Client;

class API
{
    public static function call($method, $url, $data = [])
    {
        $client = new Client(['base_uri' => config('client.API_BASE_URI')]);
        $response = $client->request($method, $url, $data);

        return json_decode($response->getBody()->getContents(), true);
    }
}
