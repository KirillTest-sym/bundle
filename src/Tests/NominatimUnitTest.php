<?php


namespace App\Limur\Map\Tests;

use Limur\Map\Service\Nominatim;
use Monolog\Test\TestCase;

class NominatimUnitTest extends TestCase
{
    public function testGetGeoData()
    {
        $nominatim = new Nominatim();
        $res = $nominatim->getGeoData([
            'country' => 'Россия',
            'city' => 'Пенза',
            'street' => 'Красная',
            'build' => '7'
        ]);
        $this->assertNotEmpty($res);
        $this->assertArrayHasKey(0, $res);
        $this->assertArrayHasKey('place_id', $res[0]);
    }
}