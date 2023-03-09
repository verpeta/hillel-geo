<?php

namespace HillelGeo;

use Illuminate\Support\Facades\Http;

class IpApiService implements GeoIPToolInteface
{
    public function city(string $ip)
    {
        $geoData = $this->makeRequest($ip);

        return $geoData['city'];
    }

    public function country(string $ip)
    {
        $geoData = $this->makeRequest($ip);

        return $geoData['country'];
    }

    private function makeRequest(string $ip): array
    {
        $response = Http::get('http://ip-api.com/json/' . $ip);

        return $response->json();
    }
}
