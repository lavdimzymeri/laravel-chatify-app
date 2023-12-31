@seoTitle(__('main.login'))
<x-authentication-card>
    <h1 class="text-center text-2xl font-bold tracking-tight text-gray-950 dark:text-white mb-6">@lang('main.login')</h1>
    @if ($status = session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $status }}
        </div>
    @endif

    <x-splade-form class="space-y-4" id="loginForm" action="{{ route('login') }}" method="post">
        @csrf
        <x-splade-input id="auth" name="auth" :label="__('main.username') . ' / ' . __('main.email')" required autofocus />
        <x-splade-input id="password" name="password" type="password" :label="__('main.password')" required
            autocomplete="current-password" />

        <div class="flex items-center justify-between mt-4">
            <x-splade-checkbox name="remember">{{ __('main.remember_me') }}</x-splade-checkbox>

            @if (Route::has('password.request'))
                <Link href="{{ route('password.request') }}"
                    class="underline text-sm text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('main.forgot_your_password?') }}
                </Link>
            @endif
        </div>
        <x-splade-submit :label="__('main.login')" class="w-full"
            style="background: rgb(63, 94, 251); background: radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);"
            onclick="reloadPage()" />
    </x-splade-form>

    <script>
        function reloadPage() {
            setTimeout(function() {
                location.reload();
            }, 1500);
        }
    </script>
</x-authentication-card>
