@extends('layouts.frontend.main')

@section('main-section')

    <h1>Record Audio</h1>
    <button id="recordButton">Start Recording</button>
    <button id="stopButton" disabled>Stop Recording</button>
    <audio id="player" controls></audio>

    <script>
        const recordButton = document.getElementById('recordButton');
        const stopButton = document.getElementById('stopButton');
        const player = document.getElementById('player');
        let mediaRecorder, audioChunks = [];

        async function startRecording() {
            const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
            mediaRecorder = new MediaRecorder(stream);
            audioChunks = [];

            mediaRecorder.addEventListener('dataavailable', event => {
                audioChunks.push(event.data);
            });

            mediaRecorder.addEventListener('stop', () => {
                const audioBlob = new Blob(audioChunks, { type: 'audio/wav' });
                const audioUrl = URL.createObjectURL(audioBlob);
                player.src = audioUrl;

                // Convert Blob to base64 and send to the API
                const reader = new FileReader();
                reader.readAsDataURL(audioBlob);
                reader.onloadend = () => {
                    const base64data = reader.result;
                    fetch('/transcription', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        },
                        body: JSON.stringify({ audio: base64data }),
                    })
                    .then(response => response.redirected ? window.location.replace(response.url) : null)
                    .catch(error => console.error('Error:', error));
                };
            });

            mediaRecorder.start();
            recordButton.disabled = true;
            stopButton.disabled = false;
        }

        function stopRecording() {
            mediaRecorder.stop();
            recordButton.disabled = false;
            stopButton.disabled = true;
        }

        recordButton.addEventListener('click', startRecording);
        stopButton.addEventListener('click', stopRecording);
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
