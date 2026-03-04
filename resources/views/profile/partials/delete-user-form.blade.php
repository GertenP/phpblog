<section class="space-y-6">

    <header>
        <h2 class="text-lg font-semibold text-base-content">
            {{ __('Delete Account') }}
        </h2>

        <p class="text-sm text-base-content mt-1">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>


    <button class="btn btn-error" onclick="my_modal_1.showModal()">
        {{ __('Delete Account') }}
    </button>


    <dialog id="my_modal_1" class="modal">
        <div class="modal-box">

            <h3 class="text-lg font-semibold">
                {{ __('Are you sure you want to delete your account?') }}
            </h3>

            <p class="text-sm mt-2">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Enter your password to confirm.') }}
            </p>


            <form id="delete-account" method="post" action="{{ route('profile.destroy') }}" class="mt-4 space-y-4">
                @csrf
                @method('delete')

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">@lang('Password')</span>
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="input input-bordered w-full"
                        placeholder="@lang('Password')"
                        required
                        autocomplete="current-password"
                    >

                    @error('password')
                        <span class="text-error text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

            </form>


            <div class="modal-action">

                <form method="dialog">
                    <button class="btn btn-ghost">
                        {{ __('Cancel') }}
                    </button>
                </form>

                <button class="btn btn-error" type="submit" form="delete-account">
                    {{ __('Delete Account') }}
                </button>

            </div>

        </div>
    </dialog>

</section>