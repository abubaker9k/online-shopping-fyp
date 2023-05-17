<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class VoiceSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('voice.voicesearch');
    }

    // public function transcribeAudio(Request $request)
    // {
    //     $audioData = $request->input('audio');
    //     $audioContents = base64_decode(preg_replace('#^data:audio/\w+;base64,#i', '', $audioData));
    //     $apiKey = '4efa68d445b6312768f031147f70b272593c917d';

    //     $client = new Client([
    //         'verify' => storage_path('app/cacert.pem'),
    //         'timeout' => 30000,
    //         'connect_timeout' => 30000,
    //     ]);
    //     $response = $client->post('https://api.deepgram.com/v1/listen', [
    //         'headers' => [
    //             'Authorization' => 'Token ' . $apiKey,
    //             'Content-Type' => 'audio/wav',
    //         ],
    //         'timeout' => 60,
    //         'connect_timeout' => 60,
    //         'body' => $audioContents,
    //     ]);

    //     $transcription = json_decode($response->getBody(), true)['results']['channels'][0]['alternatives'][0]['transcript'];

    //     // Store the transcription in the session and flash it for the next request
    //     $request->session()->put('transcription', $transcription);
    //     return redirect('/shop')->withInput('search', $transcription);
    // }




//     ####working code for another view
    public function transcribeAudio(Request $request)
    {
    $audioData = $request->input('audio');
    $audioContents = base64_decode(preg_replace('#^data:audio/\w+;base64,#i', '', $audioData));
    $apiKey = '4efa68d445b6312768f031147f70b272593c917d';

    $client = new Client([
        'verify' => storage_path('app/cacert.pem'),
        'timeout' => 30000,
        'connect_timeout' => 30000,
    ]);
    $response = $client->post('https://api.deepgram.com/v1/listen', [
        'headers' => [
            'Authorization' => 'Token ' . $apiKey,
            'Content-Type' => 'audio/wav',
        ],
        'timeout' => 60,
        'connect_timeout' => 60,
        'body' => $audioContents,
    ]);

    $transcription = json_decode($response->getBody(), true)['results']['channels'][0]['alternatives'][0]['transcript'];

    return redirect('/shop?search=' . urlencode($transcription));

}



    public function showTranscription(Request $request)
    {
        $transcription = $request->session()->get('transcription', '');

        return view('voice.transcription', compact('transcription'));
    }



}
