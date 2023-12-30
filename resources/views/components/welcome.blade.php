@vite('resources/js/app.js')
<div class="p-6 lg:p-8">
    <h1 class="text-2xl font-medium text-gray-900 dark:text-gray-300">
        Welcome to Real Dating APP!
    </h1>
    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
        Introducing Dating App.
    </p>
    <br><br><br>
    <h1 class="text-2xl font-medium text-gray-900 dark:text-gray-300">
        Coins:<br> {{ Auth::user()->coins }} Coins
    </h1>
</div>
{{-- @php
    $userId = 1;
@endphp --}}
<div style="background-color: blue">
    <button id="notifyButton" data-url="{{ route('notify', ['userId' => $userId]) }}">Click Me</button>
    @foreach (auth()->user()->notifications as $notification)
    <div>
        {{ $notification->data['name'] }} started following
    </div>
    @endforeach
    <div id="notificationContainer"></div>
</div>
<script>
    window.onload = function() {
        document.getElementById('notifyButton').addEventListener('click', function() {
            var url = document.getElementById('notifyButton').getAttribute('data-url');
            fetch(url, {
                    method: 'POST'
                    , headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        , 'Content-Type': 'application/json'
                        , 'Accept': 'application/json'
                    }
                    , body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => console.log(data))
                .catch(error => console.error('Error:', error));
        });

        Echo.channel('dummy-channel')
            .listen('DummyEvent', (event) => {
                console.log('DummyEvent received:', event);

                if (event.user_name == '{{ Auth::user()->name }}') {
                    var notificationContainer = document.getElementById('notificationContainer');
                    var notificationElement = document.createElement('div');
                    notificationElement.textContent = event.user_name + ' started following on ' + event.timestamp;
                    notificationContainer.appendChild(notificationElement);
                }
            });
    };

</script>

