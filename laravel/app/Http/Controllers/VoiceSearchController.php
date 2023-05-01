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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function transcribeAudio(Request $request)
    {
        $audioPath = $request->file('audio')->path();
        $apiKey = '4efa68d445b6312768f031147f70b272593c917d';

        $client = new Client([
            'verify' => storage_path('app/cacert.pem'),
            'timeout' => 30000, // Increase the timeout value (in seconds)
            'connect_timeout' => 30000, // Increase the connection timeout value (in seconds)
        ]);
        $response = $client->post('https://api.deepgram.com/v1/listen', [
            'headers' => [
                'Authorization' => 'Token ' . $apiKey,
                'Content-Type' => 'audio/wav',
            ],
            'timeout' => 60, // Increase the timeout value (in seconds)
            'connect_timeout' => 60, // Increase the connection timeout value (in seconds)
            'body' => fopen($audioPath, 'r'),
        ]);

        $transcription = json_decode($response->getBody(), true)['results']['channels'][0]['alternatives'][0]['transcript'];

        // Return the transcription as JSON
        return response()->json(['transcription' => $transcription]);
    }


    public function showTranscription(Request $request)
{
    $transcription = $request->session()->get('transcription', '');

    return view('voice.transcription', ['transcription' => $transcription]);
}
}
