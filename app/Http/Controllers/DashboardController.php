<?php

namespace App\Http\Controller;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Models\Room;

class DashboardController extends Controller
{

    public function showThingSpeakData()
    {
        $response = Http::get('https://api.thingspeak.com/channels/2923307/feeds.json?results=1');
        
        $data = $response->json();

        return view('your-view-name', compact('data'));
    }

    public function sendDataToThingSpeak()
    {
        $response = Http::get('https://api.thingspeak.com/update', [
            'api_key' => 'YVPSEGCNA9TVLQUE',
            'field1' => 1, // example value
        ]);

        if ($response->successful()) {
            return 'Data sent to ThingSpeak!';
        }

        return 'Failed to send data.';
    }

    public function index()
    {
        $thingSpeakUrl = 'https://api.thingspeak.com/channels/2923307/fields/1.json';
        $response = Http::get($thingSpeakUrl, [
            'api_key' => 'TG5KJ71ITTIRJBL8',
            'results' => 1,
        ]);

        $doorStatus = 'Unknown';

        if ($response->successful()) {
            $data = $response->json();

            if (!empty($data['feeds'][0]['field1'])) {
                $doorStatus = $data['feeds'][0]['field1']; // Expected: "Locked" or "Unlocked"
            }
        }

        $rooms = Room::all(); // Fetch all rooms from database

        return view('dashboard', compact('rooms'));
    }
}