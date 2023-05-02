<div class="container">
    <h1>Transcription</h1>
    @if ($transcription)
        <p>{{ $transcription }}</p>
    @else
        <p>No transcription available or the audio was not recognized.</p>
    @endif
</div>
