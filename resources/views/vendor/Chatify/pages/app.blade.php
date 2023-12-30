<style>
    body {
        /* padding-top: 40px !important; */
        background-color: black;
    }

    #notificationsButton {
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        background-color: #007BFF;
        transition: background-color 0.3s;
    }

    #notificationsButton:hover {
        background-color: #0056b3;
    }

    #notificationContainer {
        display: none;
        position: absolute;
        top: 50px;
        right: 10px;
        background-color: white;
        padding: 10px;
        border: 1px solid #ccc;
        max-width: 300px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #toggleChat {
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        background-color: #007BFF;
        transition: background-color 0.3s;
    }

    #toggleChat:hover {
        background-color: #0056b3;
    }

    div::-webkit-scrollbar {
        width: 8px;
    }

    div::-webkit-scrollbar-track {
        background: transparent;
    }

    div::-webkit-scrollbar-thumb {
        background: #3498db;
        border-radius: 5px;
    }

    div::-webkit-scrollbar-thumb:hover {
        background: #2076d8;
    }

</style>
{{-- @vite('resources/js/app.js') --}}
{{-- <div style="background-color: blue"> --}}
{{-- <button id="notifyButton" data-url="{{ route('notify', ['userId' => $userId]) }}">Click Me</button> --}}
{{-- @foreach (auth()->user()->notifications as $notification) --}}
{{-- <div> --}}
{{-- {{ $notification->data['name'] }} started following --}}
{{-- </div> --}}
{{-- @endforeach --}}
{{-- <div id="notificationContainer"></div> --}}
{{-- </div> --}}
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
@include('components-project.navbar')
@include('Chatify::layouts.headLinks')
@if (Auth::user()->getRole() == 'moderator' || Auth::user()->getRole() == 'super-admin')
<div class="messenger" style="margin-top: 0px; background-color:black;">
    {{-- ----------------------Users/Groups lists side---------------------- --}}
    <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
        {{-- Header and search bar --}}
        <div class="m-header">
            <nav>
                <a href="#">
                    @if (Auth::user()->coins >= 1)
                    <h5 style="color: red;"> {{ Auth::user()->coins }} coins available!</h3>
                        @else
                        <h5 style="color: red;"> No more coins available!</h3>
                            @endif
                </a>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                    <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                </nav>
            </nav>
            {{-- Search input --}}
            <input type="text" class="messenger-search" placeholder="Search" />
            {{-- Tabs --}}
            {{-- <div class="messenger-listView-tabs">
            <a href="#" class="active-tab" data-view="users">
                <span class="far fa-user"></span> Contacts</a>
        </div> --}}
        </div>
        {{-- tabs and lists --}}
        <div class="m-body contacts-container">
            {{-- Lists [Users/Group] --}}
            {{-- ---------------- [ User Tab ] ---------------- --}}
            <div class="show messenger-tab users-tab app-scroll" data-view="users">
                {{-- Favorites --}}
                <div class="favorites-section">
                    <p class="messenger-title"><span>Favorites</span></p>
                    <div class="messenger-favorites app-scroll-hidden"></div>
                </div>
                {{-- Saved Messages --}}
                <p class="messenger-title"><span>Your Space</span></p>
                {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
                {{-- Contact --}}
                <p class="messenger-title"><span>All Messages</span></p>
                <div class="listOfContacts" style="width: 100%;height: calc(100% - 272px);position: relative;">
                </div>
            </div>
            {{-- ---------------- [ Search Tab ] ---------------- --}}
            <div class="messenger-tab search-tab app-scroll" data-view="search">
                {{-- items --}}
                <p class="messenger-title"><span>Search</span></p>
                <div class="search-records">
                    <p class="message-hint center-el"><span>Type to search..</span></p>
                </div>
            </div>
        </div>
    </div>

    {{-- ----------------------Messaging side---------------------- --}}
    <div class="messenger-messagingView">
        {{-- header title [conversation name] amd buttons --}}
        <div class="m-header m-header-messaging">
            <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                {{-- header back button, avatar and user name --}}
                <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                    {{-- <div class="avatar av-s header-avatar"
                            style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                        </div> --}}
                    <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                </div>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <img src="{{ auth()->user()->profile_photo_url }}" class="av-s" style="border-radius: 50px;" width="35" height="35" alt="{{ auth()->user()->name }}">
                    <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                    <a href="/"><i class="fas fa-home"></i></a>
                    <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                </nav>
                <div>
                </div>
            </nav>
            {{-- Internet connection --}}
            <div class="internet-connection">
                <span class="ic-connected">Connected</span>
                <span class="ic-connecting">Connecting...</span>
                <span class="ic-noInternet">No internet access</span>
            </div>
        </div>

        {{-- Messaging area --}}
        <div class="m-body messages-container app-scroll">
            <div class="messages">
                <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
            </div>
            {{-- Typing indicator --}}
            <div class="typing-indicator">
                <div class="message-card typing">
                    <div class="message">
                        <span class="typing-dots">
                            <span class="dot dot-1"></span>
                            <span class="dot dot-2"></span>
                            <span class="dot dot-3"></span>
                        </span>
                    </div>
                </div>
            </div>

        </div>
        {{-- Send Message Form --}}
        @include('Chatify::layouts.sendForm')
    </div>
    {{-- ---------------------- Info side ---------------------- --}}
    <div class="messenger-infoView app-scroll">
        {{-- nav actions --}}
        <nav>
            <p>User Details</p>
            <a href="#"><i class="fas fa-times"></i></a>
        </nav>
        {!! view('Chatify::layouts.info')->render() !!}
    </div>
</div>
@else
<button id="toggleChat">Chat</button>
<div class="messenger" style="background-image: url('{{ asset('assets/imgs/final.jpg') }}'); background-size: cover; background-repeat: no-repeat; overflow: hidden;position: relative;">
    <div style="width: 100%; height: 100%; overflow: auto;">
        @include('user.profiles')
    </div>
    <div style="width: 70%; display: inline-block; text-align: center;">
        <div class="messenger" style="height: 70vh;" id="chatContainer">
            {{-- ----------------------Users/Groups lists side---------------------- --}}
            <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
                {{-- Header and search bar --}}
                <div class="m-header">
                    <nav>
                        <a href="#">
                            @if (Auth::user()->coins >= 1)
                            <h5 style="color: red;"> {{ Auth::user()->coins }} coins available!</h3>
                                @else
                                <h5 style="color: red;"> No more coins available!</h3>
                                    @endif
                        </a>
                        {{-- header buttons --}}
                        <nav class="m-header-right">
                            <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                            <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                        </nav>
                    </nav>
                    {{-- Search input --}}
                    <input type="text" class="messenger-search" placeholder="Search" />
                    {{-- Tabs --}}
                    {{-- <div class="messenger-listView-tabs">
                    <a href="#" class="active-tab" data-view="users">
                        <span class="far fa-user"></span> Contacts</a>
                </div> --}}
                </div>
                {{-- tabs and lists --}}
                <div class="m-body contacts-container">
                    {{-- Lists [Users/Group] --}}
                    {{-- ---------------- [ User Tab ] ---------------- --}}
                    <div class="show messenger-tab users-tab app-scroll" data-view="users">
                        {{-- Favorites --}}
                        <div class="favorites-section">
                            <p class="messenger-title"><span>Favorites</span></p>
                            <div class="messenger-favorites app-scroll-hidden"></div>
                        </div>
                        {{-- Saved Messages --}}
                        <p class="messenger-title"><span>Your Space</span></p>
                        {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
                        {{-- Contact --}}
                        <p class="messenger-title"><span>All Messages</span></p>
                        <div class="listOfContacts" style="width: 100%;height: calc(100% - 272px);position: relative;"></div>
                    </div>
                    {{-- ---------------- [ Search Tab ] ---------------- --}}
                    <div class="messenger-tab search-tab app-scroll" data-view="search">
                        {{-- items --}}
                        <p class="messenger-title"><span>Search</span></p>
                        <div class="search-records">
                            <p class="message-hint center-el"><span>Type to search..</span></p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ----------------------Messaging side---------------------- --}}
            <div class="messenger-messagingView">
                {{-- header title [conversation name] amd buttons --}}
                <div class="m-header m-header-messaging">
                    <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                        {{-- header back button, avatar and user name --}}
                        <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                            <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                            {{-- <div class="avatar av-s header-avatar"
                                    style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                                </div> --}}
                            <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                        </div>
                        {{-- header buttons --}}
                        <nav class="m-header-right">
                            <img src="{{ auth()->user()->profile_photo_url }}" class="av-s" style="border-radius: 50px;" width="35" height="35" alt="{{ auth()->user()->name }}">
                            <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                            <a href="/"><i class="fas fa-home"></i></a>
                            <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                        </nav>
                        <div>
                        </div>
                    </nav>
                    {{-- Internet connection --}}
                    <div class="internet-connection">
                        <span class="ic-connected">Connected</span>
                        <span class="ic-connecting">Connecting...</span>
                        <span class="ic-noInternet">No internet access</span>
                    </div>
                </div>

                {{-- Messaging area --}}
                <div class="m-body messages-container app-scroll">
                    <div class="messages">
                        <p class="message-hint center-el"><span>Please select a chat to start messaging</span>
                        </p>
                    </div>
                    {{-- Typing indicator --}}
                    <div class="typing-indicator">
                        <div class="message-card typing">
                            <div class="message">
                                <span class="typing-dots">
                                    <span class="dot dot-1"></span>
                                    <span class="dot dot-2"></span>
                                    <span class="dot dot-3"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- Send Message Form --}}
                @include('Chatify::layouts.sendForm')
            </div>
            {{-- ---------------------- Info side ---------------------- --}}
            <div class="messenger-infoView app-scroll">
                {{-- nav actions --}}
                <nav>
                    <p>User Details</p>
                    <a href="#"><i class="fas fa-times"></i></a>
                </nav>
                {!! view('Chatify::layouts.info')->render() !!}
            </div>
        </div>
    </div>
</div>
@endif
<script>
    document.getElementById("toggleChat").addEventListener("click", function() {
        var chatContainer = document.getElementById("chatContainer");
        if (chatContainer.style.display === "none") {
            chatContainer.style.display = "flex";
        } else {
            chatContainer.style.display = "none";
        }
    });

</script>
@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
