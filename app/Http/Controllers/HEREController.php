<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HEREController extends Controller
{
    public function getGeocode(Request $request)
    {
        $input = $request->search;
        $search_url = "https://geocode.search.hereapi.com/v1/geocode?q={$input}&apiKey=cRbpJ4dGaX_6becnqQp_Q0oNNSoQnQu0S4nvvYmKEFU";
        $result = file_get_contents($search_url);
        return response()->json($result);
    }
}
