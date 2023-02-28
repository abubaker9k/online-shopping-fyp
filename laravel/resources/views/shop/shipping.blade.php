<h1>Shipping Form </h1>
<x-guest-layout>

    <form method="POST" action="{{ url('/') }}/shipping-confirm">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />

            <x-text-input id="address" class="block mt-1 w-full"
                            type="text"
                            name="address" />

            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="phone_number" :value="__('Phone Number')" />

            <x-text-input id="phone_number" class="block mt-1 w-full"
                            type="text"
                            name="phone_number" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('home') }}">
                {{ __('Go to Home') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Shipping') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
