<?php


namespace App\Limur\Map\Service;

use Symfony\Component\HttpClient\CurlHttpClient;

class Sputnik implements MapInterface
{
    public function getGeoData(array $address): array
    {
        return (new CurlHttpClient())->request(
            'GET',
            'http://search.maps.sputnik.ru/search/addr?q='.implode($address, ',')
        )->toArray();
    }
}