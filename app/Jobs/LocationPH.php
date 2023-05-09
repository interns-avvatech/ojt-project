<?php

namespace App\Jobs;

use App\Models\Location;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class LocationPH implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = Http::get('https://ph-locations-api.buonzz.com/v1/provinces');

        $location = $response->json();

        $locations = $location['data'];

        foreach ($locations as $locationData) {
            Location::updateOrCreate(
                ['id' => $locationData['id']],
                [
                    'name' => $locationData['name'],
                    'region_code' => $locationData['region_code'],
                    'href' => $locationData['href']
                ]
            );
        }
        
        
    }
}