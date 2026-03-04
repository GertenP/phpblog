<x-guest-layout>

    <div class="flex justify-center mt-10">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">

                <h2 class="card-title justify-center mb-4">
                    {{ __('Reset Password') }}
                </h2>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    {{-- Token --}}
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    {{-- Email --}}
                    <div class="form-control mb-3">
                        <x-input-label for="email" :value="__('Email')" />

                        <x-text-input
                            id="email"
                            type="email"
                            name="email"
                            :value="old('email', $request->email)"
                            required
                            autofocus
                            autocomplete="username"
                        />

                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>


                    {{-- Password --}}
                    <div class="form-control mb-3">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                        />

                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>


                    {{-- Confirm Password --}}
                    <div class="form-control mb-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                        />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>


                    <div class="flex justify-end">
                        <x-primary-button>
                            {{ __('Reset Password') }}
                        </x-primary-button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</x-guest-layout>