@seoTitle(__('Welcome'))
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-no-repeat bg-cover"
    style="background-image: url('{{ asset('assets/imgs/test.jpg') }}'); background-position: center;">
    >
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        @if ($canLogin)
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-white hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>
                    @if ($canRegister)
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Sign
                            Up</a>
                    @endif
                    <a href="{{ route('chatify') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
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
                        <a href="{{ route('login') }}"
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
                    <!-- Profile Card 1 -->
                  <!-- Profile Card -->
<div class="bg-white rounded-lg shadow-md">
    <img src="profile1.jpg" alt="Profile Image" class="w-full h-48 object-cover rounded-t-lg">
    <div class="p-4">
        <h3 class="text-xl font-semibold text-gray-800">Jane Doe</h3>
        <p class="text-gray-600">Age: 28</p>
        <p class="text-gray-600">Location: New York</p>
        <!-- Live Location Placeholder -->
        <p class="text-gray-600">Live Location: <span id="live-location" class="text-red-500">Loading...</span></p>
        <a href="#" class="text-red-500 hover:underline">View Profile</a>
    </div>
</div>


                    <!-- Profile Card 2 -->
                    <div class="bg-white rounded-lg shadow-md">
                        <img src="profile2.jpg" alt="Profile Image" class="w-full h-48 object-cover rounded-t-lg">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800">John Smith</h3>
                            <p class="text-gray-600">Age: 32</p>
                            <p class="text-gray-600">Location: Los Angeles</p>
                            <a href="#" class="text-red-500 hover:underline">View Profile</a>
                        </div>
                    </div>

                    <!-- Profile Card 3 -->
                    <div class="bg-white rounded-lg shadow-md">
                        <img src="profile3.jpg" alt="Profile Image" class="w-full h-48 object-cover rounded-t-lg">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800">Emily Johnson</h3>
                            <p class="text-gray-600">Age: 25</p>
                            <p class="text-gray-600">Location: Chicago</p>
                            <a href="#" class="text-red-500 hover:underline">View Profile</a>
                        </div>
                    </div>

                    <!-- Add more profile cards as needed -->

                </div>
            </div>
        </section>
    @endauth
</div>


<!-- Footer Section -->
<footer class="bg-red-500 text-white py-4">
    <div class="container mx-auto text-center">
        <div class="mb-4">
            <h3 class="text-2xl font-semibold">Stay Connected</h3>
            <p>Connect with us on social media for updates and more.</p>
        </div>
        <div class="mb-4">
            <a href="#" class="text-white hover:text-red-500 mx-2">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="text-white hover:text-red-500 mx-2">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-white hover:text-red-500 mx-2">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
        <p>&copy; {{ date('Y') }} Your Dating and Love Site. All rights reserved.</p>
    </div>
</footer>



<script>
    function updateLiveLocation() {
        const liveLocationElement = document.getElementById('live-location');
        liveLocationElement.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Loading...';

        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                const mapboxApiKey = 'pk.eyJ1IjoibGF2ZGltbSIsImEiOiJjbG5tZXhkOG0wcG94MmtwYnQ3dG8wdzRjIn0.EUmlmqNUIhJypy-jc264Cw';
                const mapboxApiUrl = `https://api.mapbox.com/geocoding/v5/mapbox.places/${longitude},${latitude}.json?access_token=${mapboxApiKey}`;

                fetch(mapboxApiUrl)
                    .then(response => response.json())
                    .then(data => {
                        const address = data.features[0].place_name;
                        liveLocationElement.innerHTML = 'Live Location: ' + address;
                    })
                    .catch(error => {
                        console.error('Failed to fetch live location address:', error);
                        liveLocationElement.innerHTML = 'Live Location: Failed to fetch location';
                    });
            });
        } else {
            console.error('Geolocation is not available in this browser.');
            liveLocationElement.innerHTML = 'Live Location: Geolocation not available';
        }
    }

    updateLiveLocation();

    setInterval(updateLiveLocation, 10000); // Update every 10 seconds
</script>


