<x-guest-layout>

    <div class="flex justify-center mt-10">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">

                <h2 class="card-title justify-center mb-4">
                    {{ __('Confirm Password') }}
                </h2>

                <p class="text-sm mb-4">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </p>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    {{-- Password --}}
                    <div class="form-control mb-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                        />

                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button>
                            {{ __('Confirm') }}
                        </x-primary-button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</x-guest-layout>