<form action="/process-video" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="speed">Speed:</label>
    <input type="number" name="speed" step="0.1" required>
    <br>
    <label for="video">Video:</label>
    <input type="file" name="video" accept="video/*" required>
    <br>
    <button type="submit">Submit</button>
</form>
