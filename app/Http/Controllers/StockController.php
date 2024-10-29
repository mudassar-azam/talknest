<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class StockController extends Controller
{
    public function getStockData(Request $request)
    {
        // Retrieve search term from the request
        $searchTerm = $request->input('searchTerm');

        // You can add validation here if needed

        // Example URL with API key and search term appended
        $url = 'https://financialmodelingprep.com/api/v3/quote/' . $searchTerm . '?apikey=cf7e8999bba228ca053e38f3b258b835';

        // Create a new Guzzle client instance
        $client = new Client();

        try {
            // Send a GET request to the API
            $response = $client->request('GET', $url);

            // Decode the JSON response
            $data = json_decode($response->getBody()->getContents(), true);

            // Return the response
            return response()->json($data);
        } catch (\Exception $e) {
            // Handle exceptions, maybe return an error response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
