<x-app-layout>
    <form action="{{ url('/process-video') }}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Add new fields for user_text, user_crop_values, user_speed, and user_audio_clip -->
        <label for="user_text">User Text:</label>
        <input type="text" name="user_text" id="user_text">

        <label for="user_crop_values">Crop Values (x1, y1, x2, y2):</label>
        <input type="text" name="user_crop_values[]" id="user_crop_values[]">

        <label for="user_speed">Speed:</label>
        <input type="number" name="user_speed" id="user_speed">

        <label for="user_audio_clip">Audio Clip:</label>
        <input type="file" name="user_audio_clip" id="user_audio_clip">
        <br>

        <!-- Keep the existing form fields -->
        <label >Video 1</label>
        <input type="file" name="video1" id="video1" required>
        <label >Video 2</label>
        <input type="file" name="video2" id="video2" required>

        <!-- Keep the existing form input -->
        <input type="submit" value="Process Video">
         </form>



    {{-- working code
        <form action="{{ url('/process-video') }}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Video paths -->
        <label for="video1">Video 1:</label>
        <input type="file" name="video1" id="video1" required>
        <br>
        <label for="video2">Video 2:</label>
        <input type="file" name="video2" id="video2" required>
        <br>
        <!-- User text -->
        <label for="user_text">User Text:</label>
        <input type="text" name="user_text" id="user_text">
        <br>
        <!-- User crop values -->
        <label for="user_crop_values[]">Crop Values (x1, y1, x2, y2):</label>
        <input type="number" name="user_crop_values[]" id="user_crop_values[]" min="0" step="1" required>
        <input type="number" name="user_crop_values[]" id="user_crop_values[]" min="0" step="1" required>
        <input type="number" name="user_crop_values[]" id="user_crop_values[]" min="0" step="1" required>
        <input type="number" name="user_crop_values[]" id="user_crop_values[]" min="0" step="1" required>
        <br>
        <!-- User speed -->
        <label for="user_speed">Speed:</label>
        <input type="number" name="user_speed" id="user_speed" min="0.1" step="0.1" required>
        <br>
        <!-- User audio clip -->
        <label for="user_audio_clip">Audio Clip:</label>
        <input type="file" name="user_audio_clip" id="user_audio_clip">
        <br>
        <input type="submit" value="Process Video">
    </form> --}}





    {{-- #flask code --}}
    {{-- <form method="POST" action="http://127.0.0.1:5000/" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="speed" :value="__('Speed')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="speed" :value="old('speed')" required autofocus />
            <x-input-error :messages="$errors->get('Product Name')" class="mt-2" />
        </div>

        {{-- Video upload --}}
        {{-- <div class="mt-4">
            <x-input-label for="Video" :value="__('Video')" />
            <x-text-input id="product_video" class="block mt-1 w-full" type="file" name="file" :value="old('product_video')" required />
            <x-input-error :messages="$errors->get('product_video')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Add Product') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Display video -->
    @if(isset($video_url))
    <video controls>
        <source src="{{ $video_url }}" type="video/mp4">
    </video>
    @endif --}}

</x-app-layout>

















{{--
<x-guest-layout>
    <form method="POST" action="{{ url('/') }}/product" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="product_name" :value="__('Product Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="product_name" :value="old('product_name')" required autofocus />
            <x-input-error :messages="$errors->get('Product Name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="Category" :value="__('Category')" />
            <x-text-input id="category" class="block mt-1 w-full" type="text" name="category" :value="old('category')" required />
            <x-input-error :messages="$errors->get('category')" class="mt-2" />
        </div>

        <!-- image upload -->
        <div class="mt-4">
            <x-input-label for="Image" :value="__('Image')" />
            <x-text-input id="product_image" class="block mt-1 w-full" type="file" name="product_image" :value="old('product_image')" required />
            <x-input-error :messages="$errors->get('product_image')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
               <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
