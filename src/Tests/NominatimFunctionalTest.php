<?php


namespace Limur\Map\Tests;

use Limur\Map\Service\Nominatim;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NominatimFunctionalTest extends WebTestCase
{
    public function testGetGeoData()
    {
        $client = static::createClient();

        $this->createMock(Nominatim::class);

        $client->request('POST', '/map/nominatim/geo', [
            'country' => 'Россия',
            'city' => 'Пенза',
            'street' => 'Красная',
            'build' => '7'
        ]);
        $this->assertEquals('200', $client->getResponse()->getStatusCode());
    }
}