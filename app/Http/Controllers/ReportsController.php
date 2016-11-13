<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ReportsController extends Controller
{
    public function getAuditServiceReport($application, $event, $startDate, $endDate)
    {
        $client = new Client(['base_uri' => 'localhost:8080/v1/report/']);

        try {
            $response = $client->get($application .'/' . $event . '/' . $startDate . '/' . $endDate);
        } catch (Exception $exception) {
            $errorMessage = "failed to retrieve client response: " . $exception->getMessage();
            Log::error($errorMessage);
            return response()->json([$errorMessage], 500);
        }

        return response($response->getBody(), $response->getStatusCode(), $response->getHeaders());

    }

    public function publication()
    {
        return view("publication.publication");
    }

}
