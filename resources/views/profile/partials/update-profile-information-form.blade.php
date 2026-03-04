<section>

    <header>
        <h2 class="text-lg font-semibold text-base-content">
            {{ __('Profile Information') }}
        </h2>

        <p class="text-sm text-base-content mt-1">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>


    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>


    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-4">
        @csrf
        @method('patch')

        {{-- Name --}}
        <div class="form-control">
            <label class="label">
                <span class="label-text">@lang('Name')</span>
            </label>

            <input
                type="text"
                name="name"
                class="input input-bordered w-full"
                value="{{ old('name', $user->name) }}"
                placeholder="@lang('Name')"
                required
                autofocus
                autocomplete="name"
            >

            @error('name')
                <span class="text-error text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>


        {{-- Email --}}
        <div class="form-control">
            <label class="label">
                <span class="label-text">@lang('Email')</span>
            </label>

            <input
                type="email"
                name="email"
                class="input input-bordered w-full"
                value="{{ old('email', $user->email) }}"
                placeholder="@lang('Email')"
                required
                autocomplete="username"
            >

            @error('email')
                <span class="text-error text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>


        {{-- Email verification --}}
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div class="mt-2">

                <p class="text-sm text-base-content">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification" class="link link-primary ml-1">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <div class="alert alert-success mt-2">
                        <span>
                            {{ __('A new verification link has been sent to your email address.') }}
                        </span>
                    </div>
                @endif

            </div>
        @endif


        <div class="flex items-center gap-4 mt-4">

            <button class="btn btn-primary">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <span
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-success"
                >
                    {{ __('Saved.') }}
                </span>
            @endif

        </div>

    </form>

</section>