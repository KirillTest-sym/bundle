<?php


namespace Limur\Map\Service;

interface MapInterface
{
    public function getGeoData(array $address): array;
}