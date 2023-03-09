<?php

namespace HillelGeo;

use GeoIp2\Database\Reader;
use GeoIp2\Exception\AddressNotFoundException;
use GeoIp2\Model\City;
use MaxMind\Db\Reader\InvalidDatabaseException;

class MaxMindService implements GeoIPToolInteface
{
    /**
     * @throws AddressNotFoundException
     * @throws InvalidDatabaseException
     */
    public function country(string $ip): string
    {
        return $this->getReader($ip)->country->name;
    }

    /**
     * @throws AddressNotFoundException
     * @throws InvalidDatabaseException
     */
    public function city(string $ip): string
    {
        return $this->getReader($ip)->city->name;
    }

    /**
     * @throws AddressNotFoundException
     * @throws InvalidDatabaseException
     */
    public function code(string $ip): string
    {
        return $this->getReader($ip)->postal->code;
    }

    /**
     * @throws AddressNotFoundException
     * @throws InvalidDatabaseException
     */
    private function getReader(string $ip): City
    {
        $reader = new Reader(__DIR__. '/./../files/GeoLite2-City.mmdb');

        return $reader->city($ip);
    }
}
