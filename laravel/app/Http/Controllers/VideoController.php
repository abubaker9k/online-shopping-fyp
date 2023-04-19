<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function processVideo(Request $request)
    {
        $request->validate([
            'speed' => 'required|numeric',
            'video' => 'required|mimes:mp4,mov,avi,flv,mkv'
        ]);

        // Save the video file temporarily
        $videoPath = $request->file('video')->store('temp_videos');
        $absoluteVideoPath = storage_path('app/' . $videoPath);

        $response = Http::attach('video', file_get_contents($absoluteVideoPath), 'video.mp4')
            ->post('http://localhost:5000/process-video', [
                'speed' => $request->input('speed'),
            ]);

        $responseData = $response->json();
        if (is_array($responseData) && isset($responseData['processed_video_path'])) {
            $processedVideoPath = 'http://localhost:5000/' . $responseData['processed_video_path'];
            return view('display_processed_video', ['videoPath' => $processedVideoPath]);
        } else {
            echo 'empty data';
        }
    }
}
