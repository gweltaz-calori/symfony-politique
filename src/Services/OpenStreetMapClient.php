<?php
/**
 * Created by PhpStorm.
 * User: gweltaz
 * Date: 25/11/2018
 * Time: 08:31
 */

namespace App\Services;


use GuzzleHttp\Client;

class OpenStreetMapClient
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://nominatim.openstreetmap.org/',
            'verify' => false
        ]);
    }

    public function getCooordinates($country) {
        $response = $this->client->get("search.php?country=".$country."&format=json");
        $body = json_decode($response->getBody()->getContents(),true);

        return [
            "lat" => $body[0]["lat"],
            "lon" => $body[0]["lon"]
        ];
    }
}