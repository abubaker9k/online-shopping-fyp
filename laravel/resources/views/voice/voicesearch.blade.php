<button id="startRecording">Start Recording</button>
<button id="stopRecording" disabled>Stop Recording</button>
<audio controls id="audioPlayer"></audio>
<form method="POST" action="/transcription" enctype="multipart/form-data">
    @csrf
    <input type="file" name="audio" id="audioFile" hidden accept="audio/*">
    <button type="submit" id="submit" disabled>Transcribe</button>
</form>

<script src="{{ asset('js/record.js') }}"></script>







{{-- <h1>Click mic to record audio</h1>
<form action="/transcription" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="audio" accept="audio/*">
    <button type="submit">Transcribe</button>
</form>


<li><a href="/" class="under">Back To Home</a></li> --}}
