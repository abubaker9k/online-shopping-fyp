<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisualController extends Controller
{
    public function search(Request $request)
    {
        $url = 'http://localhost:5000/visual-search'; // Replace with the URL of your Flask API
        $imagePath = $request->file('image')->getRealPath();
        $cfile = curl_file_create($imagePath, 'image/jpeg', 'image.jpg');

        $postData = [
            'image' => $cfile,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        return view('visual-search-results', ['nearest_neighbors' => json_decode($response)->nearest_neighbors]);
    }
}
