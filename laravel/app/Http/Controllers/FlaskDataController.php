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
    public function runBlenderScript()
    {
        set_time_limit(300); // 5 minutes

        // Set the path to the Blender executable and the script
        $blenderPath = 'D:\\software\\blender\\blender.exe';
        $scriptPath = storage_path('app/blender_video.py');

        // Run the Blender command with the script
        $output = shell_exec("$blenderPath -b -P $scriptPath 2>&1");

        // Return the output or an appropriate response
        return response()->json(['message' => 'Blender script executed', 'output' => $output]);
    }
}
