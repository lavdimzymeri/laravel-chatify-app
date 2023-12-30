@if (Auth::user()->getRole() == 'super-admin')
    <x-layout>
        <x-slot name="header">
            {{ __('Home') }}
        </x-slot>

        <x-panel class="flex flex-col items-center pt-16 pb-16">
            <x-application-logo class="block h-12 w-auto" />

            <div class="mt-8 text-2xl">
                Welcome to your Chatify profile!
            </div>
        </x-panel>
    </x-layout>
@else
    @seoTitle(__('Welcome'))
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-no-repeat bg-cover"
        style="background-image: url('{{ asset('assets/imgs/test.jpg') }}'); background-position: center;">
        >
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            @if ($canLogin)
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ route('user.find.friends') }}"
                            class="font-semibold text-white hover:text-white ml-2 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Find Friends</a>
                        <a href="{{ route('chatify') }}"
                            class="font-semibold text-white hover:text-white ml-2 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Chat Now</a>
                        <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-white hover:text-white ml-2 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Profile</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-white hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>
                        @if ($canRegister)
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-white hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Sign
                                Up</a>
                        @endif
                        <a href="{{ route('chatify') }}"
                            class="font-semibold text-white hover:text-white ml-2 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Chat Now</a>
                    @endauth
                </div>
            @endif

            <div class="mt-12 sm:mt-16 lg:mt-20">
                <div class="text-center">
                    <h1 class="text-5xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                        Welcome to <span class="text-red-500">ChatApp</span>
                    </h1>
                    <p
                        class="mt-3 text-base text-white sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Connect with friends, start conversations, and enjoy seamless chat experiences.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center">
                        <div class="rounded-md shadow">
                            <a href="{{ route('user.find.friends') }}"
                                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-500 hover:bg-red-600 md:py-4 md:text-lg md:px-10 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300 ease-in-out">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto text-center">
        @include('components-project.slider')
    </div>
    @include('components-project.footer')
@endif
