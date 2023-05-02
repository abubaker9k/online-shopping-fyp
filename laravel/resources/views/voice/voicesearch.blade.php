<!DOCTYPE html>
<html>
<head>
    <title>Record Audio</title>
</head>
<body>
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
</body>
</html>












{{--
  <button id="startRecording">Start Recording</button>
  <button id="stopRecording" disabled>Stop Recording</button>
  <audio controls id="audioPlayer"></audio>
  <form method="POST" action="/transcription" enctype="multipart/form-data">
      @csrf
      <input type="file" name="audio" id="audioFile" hidden accept="audio/*">
      <input type="file" id="hiddenFileInput" style="display:none">
      <button type="submit" id="submit" disabled>Transcribe</button>
  </form>


<script src="{{ asset('js/record.js') }}"></script>
<script src="https://cdn.WebRTC-Experiment.com/RecordRTC.js"></script> --}}








{{-- <h1>Click mic to record audio</h1>
<form action="/transcription" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="audio" accept="audio/*">
    <button type="submit">Transcribe</button>
</form>


<li><a href="/" class="under">Back To Home</a></li> --}}
