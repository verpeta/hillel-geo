<?php

namespace HillelGeo;

interface GeoIPToolInteface
{

    public function city(string $ip);
    public function country(string $ip);

}
