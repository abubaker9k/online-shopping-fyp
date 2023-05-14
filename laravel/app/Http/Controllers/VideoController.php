<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Http\JsonResponse;

class VideoController extends Controller
{


    public function processVideo(Request $request)
    {
        $request->validate([
            'video1' => 'required|mimes:mp4',
            'video2' => 'required|mimes:mp4',
            'user_audio_clip' => 'nullable|mimes:mp3',
        ]);

        $video1 = $request->file('video1')->store('videos');
        $video2 = $request->file('video2')->store('videos');
        $audio_clip = $request->file('user_audio_clip') ? $request->file('user_audio_clip')->store('audio') : '';
        $text = $request->input('user_text');
        $crop_values = implode(',', $request->input('user_crop_values'));
        $speed = $request->input('user_speed');
        $output_video = public_path('output_video.mp4');

        $python_executable = 'D:\software\python37\python.exe';
        $python_script = 'D:\\codes\\online-shopping-fyp\\laravel\\resources\\scripts\\video_edit.py';
        $command = [
            $python_executable,
            $python_script,
            $video1,
            $video2,
            $crop_values,
            $speed,
            $audio_clip,
            $text,
            $output_video
        ];

        $process = new Process($command);
        $process->run();

        // Check if the script executed successfully
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return response()->download($output_video);
    }

    // working code without flask
    // public function processVideo(Request $request)
    // {
    //     $request->validate([
    //         'video1' => 'required|file',
    //         'video2' => 'required|file',
    //         'user_text' => 'nullable|string',
    //         'user_crop_values' => 'required|array',
    //         'user_speed' => 'required|numeric',
    //         'user_audio_clip' => 'nullable|file',
    //     ]);

    //     $video1Path = $request->file('video1')->store('videos');
    //     $video2Path = $request->file('video2')->store('videos');
    //     $audioClipPath = $request->hasFile('user_audio_clip') ? $request->file('user_audio_clip')->store('audio_clips') : "";

    //     $userText = $request->input('user_text');
    //     $userCropValues = implode(',', $request->input('user_crop_values'));
    //     $userSpeed = $request->input('user_speed');

    //     $outputVideoPath = 'output_videos/' . uniqid() . '.mp4';

    //     $pythonScriptPath = 'D:\\codes\\online-shopping-fyp\\laravel\\resources\\scripts\\video_edit.py';

    //     $command = escapeshellcmd("python $pythonScriptPath $video1Path $video2Path $userCropValues $userSpeed $audioClipPath $userText $outputVideoPath");
    //     shell_exec($command);

    //     // Store the output video and perform any other required actions

    //     return redirect('/')->with('success', 'Video processed successfully');
    // }



    // public function processVideo(Request $request)
    // {
    //     // Validate and store the uploaded files, and get their paths
    //     $request->validate([
    //         'video1' => 'required|mimes:mp4',
    //         'video2' => 'required|mimes:mp4',
    //         'user_text' => 'nullable|string',
    //         'user_crop_values.*' => 'required|integer',
    //         'user_speed' => 'required|numeric|min:0.1',
    //         'user_audio_clip' => 'nullable|mimes:mp3',
    //     ]);

    //     $video1 = $request->file('video1')->store('videos');
    //     $video2 = $request->file('video2')->store('videos');
    //     $video_paths = [storage_path("app/$video1"), storage_path("app/$video2")];

    //     $user_audio_clip_path = null;
    //     if ($request->hasFile('user_audio_clip')) {
    //         $user_audio_clip = $request->file('user_audio_clip')->store('audio');
    //         $user_audio_clip_path = storage_path("app/$user_audio_clip");
    //     }

    //     // Pass the form data as command-line arguments to the Python script
    //     $process = new Process([
    //         'python3',
    //         'D:/online-shopping-fyp/laravel/resources/scripts/video_edit.py',
    //         $video_paths[0],
    //         $video_paths[1],
    //         $request->input('user_text'),
    //         implode(',', $request->input('user_crop_values')),
    //         $request->input('user_speed'),
    //         $user_audio_clip_path
    //     ]);

    //     // Run the Python script and check for errors
    //     try {
    //         $process->mustRun();
    //         return response()->download('output_video.mp4')->deleteFileAfterSend(true);
    //     } catch (ProcessFailedException $exception) {
    //         return response()->json(['error' => 'Video processing failed.']);
    //     }
    // }



#code for flask api
// public function processVideo(Request $request)
// {
//     $request->validate([
//         'speed' => 'required|numeric',
//         'video' => 'required|mimes:mp4,mov,avi,flv,mkv'
//     ]);

//     // Save the video file temporarily
//     $videoPath = $request->file('video')->store('temp_videos');
//     $absoluteVideoPath = storage_path('app/' . $videoPath);

//     $response = Http::attach('video', file_get_contents($absoluteVideoPath), 'video.mp4')
//         ->post('http://localhost:5000/process-video', [
//             'speed' => $request->input('speed'),
//         ]);

//     $responseData = $response->json();
//     if (is_array($responseData) && isset($responseData['processed_video_path'])) {
//         $processedVideoPath = 'http://localhost:5000/' . $responseData['processed_video_path'];
//         return view('display_processed_video', ['videoPath' => $processedVideoPath]);
//     } else {
//         echo 'empty data';
//     }
// }

}
