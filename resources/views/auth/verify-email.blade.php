<x-guest-layout>

    <div class="flex justify-center mt-10">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">

                <h2 class="card-title justify-center mb-4">
                    {{ __('Verify Email') }}
                </h2>

                <p class="text-sm mb-4">
                    {{ __('Thanks for signing up! Before getting started, verify your email address by clicking the link we just emailed to you. If you didn\'t receive the email, we will gladly send you another.') }}
                </p>

                @if (session('status') == 'verification-link-sent')
                    <div role="alert" class="alert alert-success mb-4">
                        <span>
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </span>
                    </div>
                @endif

                <div class="flex items-center justify-between mt-4">

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <x-primary-button>
                            {{ __('Resend Verification Email') }}
                        </x-primary-button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="btn btn-ghost btn-sm">
                            {{ __('Log Out') }}
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>

</x-guest-layout>