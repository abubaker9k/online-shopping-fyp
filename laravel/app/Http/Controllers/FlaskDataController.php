<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlaskDataController extends Controller
{
    public function index()
    {
        $api_url = "http://localhost:5000/data"; // Replace with your Flask API endpoint URL
        $data = file_get_contents($api_url);
        $data = json_decode($data, true);

        return view('flask-data', ['data' => $data]);
    }
}
