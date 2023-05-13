<x-app-layout>
    <div class="form-styling">
    <div>


    <form method="POST" action="{{ url('/') }}/product" enctype="multipart/form-data">
        @csrf
    <!-- Name -->
    <div>
        <x-input-label for="product_name" :value="__('Product Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="product_name" :value="old('product_name')" required autofocus />
        <x-input-error :messages="$errors->get('Product Name')" class="mt-2" />
    </div>

    <!-- Category -->
    <div class="mt-4">
        <x-input-label for="Category" :value="__('Category')" />
        <x-text-input id="category" class="block mt-1 w-full" type="text" name="category" :value="old('category')" required />
        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>

      <!-- Price -->
      <div class="mt-4">
        <x-input-label for="Price" :value="__('Price')" />
        <x-text-input id="category" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
        <x-input-error :messages="$errors->get('price')" class="mt-2" />
    </div>

       <!-- Short Description -->
       <div class="mt-4">
        <x-input-label for="description" :value="__('description')" />
        <x-text-input id="category" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    {{-- Image upload --}}
    <div class="mt-4">
        <x-input-label for="Image" :value="__('Image')" />
        <x-text-input id="product_image" class="block mt-1 w-full" type="file" name="product_image" :value="old('product_image')" required />
        <x-input-error :messages="$errors->get('product_image')" class="mt-2" />
    </div>

    {{-- Video upload --}}
    <div class="mt-4">
        <x-input-label for="Video" :value="__('Video')" />
        <x-text-input id="product_video" class="block mt-1 w-full" type="file" name="product_video" :value="old('product_video')" required />
        <x-input-error :messages="$errors->get('product_video')" class="mt-2" />
    </div>

    {{-- 3D model upload --}}
    <div class="mt-4">
        <x-input-label for="Model" :value="__('Model')" />
        <x-text-input id="product_model" class="block mt-1 w-full" type="file" name="product_model" :value="old('product_model')" required />
        <x-input-error :messages="$errors->get('product_model')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ml-4">
            {{ __('Add Product') }}
        </x-primary-button>
    </div>
</form>
</div>
</div>
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
