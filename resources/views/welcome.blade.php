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
    @auth
        <!-- Profile Cards Section -->
        <section class="bg-gray-100 py-8">
            <div class="container mx-auto">
                <h2 class="text-3xl font-semibold text-gray-800 mb-6">Meet Our Members</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <!-- User Profile Card 1 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('assets/imgs/person2.jpeg') }}" alt="Profile Image"
                            class="w-full h-56 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Jane Doe</h3>
                            <p class="text-gray-600 mb-1">Age: 28</p>
                            <p class="text-gray-600">Location: New York</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('assets/imgs/PersonX.jpeg') }}" alt="Profile Image"
                            class="w-full" style="height: 246px;">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Maria Jones</h3>
                            <p class="text-gray-600 mb-1">Age: 28</p>
                            <p class="text-gray-600">Location: New York</p>
                        </div>
                    </div>

                    <!-- User Profile Card 2 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('assets/imgs/person1.jpeg') }}" alt="Profile Image"
                            class="w-full h-56 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">John Smith</h3>
                            <p class="text-gray-600 mb-1">Age: 32</p>
                            <p class="text-gray-600">Location: Los Angeles</p>
                        </div>
                    </div>

                    <!-- User Profile Card 3 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('assets/imgs/person3.jpeg') }}" alt="Profile Image"
                            class="w-full h-56 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Emily Johnson</h3>
                            <p class="text-gray-600 mb-1">Age: 25</p>
                            <p class="text-gray-600">Location: Chicago</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endauth
</div>
@include('components-project.footer')
