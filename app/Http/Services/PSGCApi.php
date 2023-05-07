<?php

namespace App\Http\Services;

use GuzzleHttp\Client;

class PSGCApi
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://psgc.gitlab.io/api/',
        ]);
    }

    public function getAllLocations()
    {
        $response = $this->client->get('regions');
        $regions = json_decode($response->getBody(), true);

        $response = $this->client->get('provinces');
        $provinces = json_decode($response->getBody(), true);

        $response = $this->client->get('municipalities');
        $municipalities = json_decode($response->getBody(), true);

        $response = $this->client->get('barangays');
        $barangays = json_decode($response->getBody(), true);

        return [
            'regions' => $regions,
            'provinces' => $provinces,
            'municipalities' => $municipalities,
            'barangays' => $barangays,
        ];
    }
}

