<x-guest-layout>

    <div class="flex justify-center mt-10">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">

                <h2 class="card-title justify-center mb-4">
                    {{ __('Reset Password') }}
                </h2>

                <p class="text-sm mb-4">
                    {{ __('Forgot your password? No problem. Enter your email and we will send you a password reset link.') }}
                </p>

                {{-- Session Status --}}
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="form-control mb-4">
                        <x-input-label for="email" :value="__('Email')" />

                        <x-text-input
                            id="email"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                        />

                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button>
                            {{ __('Email Password Reset Link') }}
                        </x-primary-button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</x-guest-layout>