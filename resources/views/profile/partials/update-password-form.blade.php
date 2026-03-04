<section>

    <header>
        <h2 class="text-lg font-semibold text-base-content">
            {{ __('Update Password') }}
        </h2>

        <p class="text-sm text-base-content mt-1">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>


    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-4">
        @csrf
        @method('put')

        {{-- Current Password --}}
        <div class="form-control">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />

            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
            />

            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1" />
        </div>


        {{-- New Password --}}
        <div class="form-control">
            <x-input-label for="update_password_password" :value="__('New Password')" />

            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1" />
        </div>


        {{-- Confirm Password --}}
        <div class="form-control">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />

            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1" />
        </div>


        <div class="flex items-center gap-4 mt-4">

            <x-primary-button>
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
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