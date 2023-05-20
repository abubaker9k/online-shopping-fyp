{{-- @if (session('coloredModelUrl'))
    <div class="alert alert-info">
        Colored Model URL: {{ session('coloredModelUrl') }}
    </div>
@endif


@if (session('blenderPath') && session('outputName') && session('command'))
    <div class="alert alert-info">
        Blender Path: {{ session('blenderPath') }}<br>
        Output Name: {{ session('outputName') }}<br>
        Command: {{ session('command') }}
    </div>
@endif --}}

<x-app-layout>

    <h1>Upload glTF Model (GLB Format)</h1>
    <form action="/upload-gltf" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="model">Model:</label>
        <input type="file" name="model" id="model" required>
        <br>
        <button type="submit">Upload</button>
    </form>

</x-app-layout>


{{--
<form action="{{ route('processModel') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="model">Upload 3D Model:</label>
    <input type="file" name="model" required>

    <label for="r">Red (0-255):</label>
    <input type="number" name="r" min="0" max="255" required>

    <label for="g">Green (0-255):</label>
    <input type="number" name="g" min="0" max="255" required>

    <label for="b">Blue (0-255):</label>
    <input type="number" name="b" min="0" max="255" required>

    <button type="submit">Submit</button>
</form>  --}}
