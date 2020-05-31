<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HEREController extends Controller
{
    public function getGeocode(Request $request)
    {
        $input = urlencode($request->search);
        $search_url = "https://geocode.search.hereapi.com/v1/geocode?q={$input}&apiKey=cRbpJ4dGaX_6becnqQp_Q0oNNSoQnQu0S4nvvYmKEFU";
        $result = file_get_contents($search_url);
        return response()->json($result);
    }

    public function getDiscover(Request $request)
    {
        $input = urlencode($request->search);
        $search_url = "https://discover.search.hereapi.com/v1/discover?at=52.62621%2C13.51700&q={$input}&apiKey=cRbpJ4dGaX_6becnqQp_Q0oNNSoQnQu0S4nvvYmKEFU";
        $result = file_get_contents($search_url);
        return response()->json($result);
    }
}
