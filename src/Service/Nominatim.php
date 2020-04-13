<?php

namespace App\Limur\Map\Service;

use Symfony\Component\HttpClient\CurlHttpClient;

class Nominatim implements MapInterface
{
    public function getGeoData(array $address): array
    {
        return (new CurlHttpClient())->request(
            'GET',
            'https://nominatim.openstreetmap.org/search?format=json&q='.implode($address, ',')
        )->toArray();
    }
}