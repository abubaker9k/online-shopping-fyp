<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class VideoController extends Controller
{

    public function processVideo(Request $request)
    {
        // Validate and store the uploaded files, and get their paths
        $request->validate([
            'video1' => 'required|mimes:mp4',
            'video2' => 'required|mimes:mp4',
            'user_text' => 'nullable|string',
            'user_crop_values.*' => 'required|integer',
            'user_speed' => 'required|numeric|min:0.1',
            'user_audio_clip' => 'nullable|mimes:mp3',
        ]);

        // Ensure the directories exist
        Storage::makeDirectory('videos');
        Storage::makeDirectory('audio');

        $video1 = $request->file('video1')->store('videos');
        $video2 = $request->file('video2')->store('videos');
        $video_paths = [storage_path("app/$video1"), storage_path("app/$video2")];

        $user_audio_clip_path = null;
        if ($request->hasFile('user_audio_clip')) {
            $user_audio_clip = $request->file('user_audio_clip')->store('audio');
            $user_audio_clip_path = storage_path("app/$user_audio_clip");
        }

        // Set environment variables for the Python script
        putenv("VIDEO1_PATH=" . $video_paths[0]);
        putenv("VIDEO2_PATH=" . $video_paths[1]);
        putenv("CROP_VALUES=" . implode(',', $request->input('user_crop_values')));
        putenv("SPEED=" . $request->input('user_speed'));
        putenv("AUDIO_CLIP_PATH=" . ($user_audio_clip_path ?? ""));
        putenv("USER_TEXT=" . $request->input('user_text'));

        // Add output video path as an environment variable
        $output_video_path = storage_path("app/output_video.mp4");
        putenv("OUTPUT_VIDEO_PATH=" . $output_video_path);

        // Run the Python script and check for errors
        $process = new Process([
            'python',
            'D:\codes\online-shopping-fyp\laravel\resources\scripts\video_edit.py',
        ], null, ['SYSTEMROOT' => getenv('SYSTEMROOT'), 'PATH' => getenv("PATH")]);

        try {
            $process->mustRun();
            return response()->download($output_video_path)->deleteFileAfterSend(true);
        } catch (ProcessFailedException $exception) {
            return response()->json(['error' => 'Video processing failed.', 'message' => $exception->getMessage()]);
        }
    }

    public function runPythonScript()
    {
        $process = new Process(['python', public_path('example_script.py')],
            null,
            ['SYSTEMROOT' => getenv('SYSTEMROOT'), 'PATH' => getenv("PATH")]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return response()->json(['output' => $process->getOutput()]);
    }



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
