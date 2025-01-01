<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetCityGeoCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:geocode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and update the geocode information for Slovak cities';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cities = City::all();

        foreach ($cities as $city) {
            $apiKey = env('GOOGLE_MAPS_API_KEY');
            $address = $city->city_hall_address.', '.$city->name.', Slovakia';

            $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
                'address' => $address,
                'key' => $apiKey,
            ]);

            $data = $response->json();

            if (! empty($data['results'])) {
                $latitude = $data['results'][0]['geometry']['location']['lat'];
                $longitude = $data['results'][0]['geometry']['location']['lng'];

                $city->update([
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                ]);

                $this->info("Updated {$city->name} with coordinates: {$latitude}, {$longitude}");
            } else {
                $this->warn("No coordinates found for {$city->name}");
            }
        }

        $this->info('Geolocation completed!');
    }
}
