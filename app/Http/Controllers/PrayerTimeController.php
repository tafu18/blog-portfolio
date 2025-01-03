<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PrayerTimeRequest;
use GuzzleHttp\Client;

class PrayerTimeController extends Controller
{
    public function getTimes(PrayerTimeRequest $request)
    {
        $client = new Client();
        $baseUrl = "https://vakit.vercel.app/api/timesFromPlace";

        $queryParams = [
            'country' => $request->country,
            'region' => $request->region,
            'city' => $request->city,
            'date' => $request->date ?? now()->format('Y-m-d'),
            'days' => $request->days ?? 1,
            'timezoneOffset' => 180,
            'calculationMethod' => 'Turkey',
        ];

        try {
            $response = $client->get($baseUrl, ['query' => $queryParams]);
            $data = json_decode($response->getBody()->getContents(), true);

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Namaz vakitleri alınamıyor.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getMonthlyTimes(Request $request)
    {
        $client = new Client();

        $baseUrl = "https://vakit.vercel.app/api/timesFromPlace";

        $queryParams = [
            'country' => 'Turkey',
            'region' => $request->region ?? 'İstanbul',
            'city' => $request->city ?? 'İstanbul',
            'date' => now()->startOfMonth()->format('Y-m-d'),
            'days' => now()->daysInMonth,
            'timezoneOffset' => 180,
            'calculationMethod' => 'Turkey',
        ];

        try {
            $response = $client->get($baseUrl, ['query' => $queryParams]);

            if ($response->getStatusCode() !== 200) {
                return response()->json(['message' => 'Namaz vakitleri alınamıyor'], 500);
            }

            $data = json_decode($response->getBody(), true);

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Namaz vakitleri alınamıyor', 'error' => $e->getMessage()], 500);
        }
    }
}
