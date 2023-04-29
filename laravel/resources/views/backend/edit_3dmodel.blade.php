@if (session('coloredModelUrl'))
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
@endif

<form id="model-form" action="{{ route('process') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="model">Upload 3D Model:</label>
    <input type="file" name="model" required>
    <label for="color">Color (RGB):</label>
    <input type="color" name="color" value="#ff0000" required>
    <button type="submit">Submit</button>
</form>



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
