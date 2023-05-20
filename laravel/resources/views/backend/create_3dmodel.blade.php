<form action="{{ url('/process-model') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="item_type">Item Type:</label>
        <select name="item_type" id="item_type">
            <option value="shirt">Shirt</option>
            <option value="card">Visiting Card</option>
        </select>
    </div>

    <!-- Add fields for shirt options -->
    <div id="shirt_options">
        <label for="sleeve_type">Sleeve Type:</label>
        <select name="sleeve_type" id="sleeve_type">
            <option value="full">Full Sleeves</option>
            <option value="half">Half Sleeves</option>
        </select>

        <label for="shirt_texture">Shirt Texture:</label>
        <input type="file" name="shirt_texture" id="shirt_texture">
    </div>

    <!-- Add fields for card options -->
    <div id="card_options" style="display: none;">
        <label for="card_length">Card Length:</label>
        <input type="number" name="card_length" id="card_length">

        <label for="card_width">Card Width:</label>
        <input type="number" name="card_width" id="card_width">

        <label for="card_front_image">Card Front Image:</label>
        <input type="file" name="card_front_image" id="card_front_image">

        <label for="card_back_image">Card Back Image:</label>
        <input type="file" name="card_back_image" id="card_back_image">
    </div>

    <input type="submit" value="Process Model">
</form>
