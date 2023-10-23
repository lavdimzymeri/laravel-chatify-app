    <style>
        body {
            padding-top: 90px !important;
            background-color: black;
        }

        #toggleChat {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        #toggleChat:hover {
            background-color: #0056b3;
        }
    </style>
    @include('components-project.navbar')
    @include('Chatify::layouts.headLinks')
    @if (Auth::user()->getRole() == 'moderator' || Auth::user()->getRole() == 'super-admin')
        <div class="messenger" style="margin-top: 80px; background-color:black;">
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
                            <div class="avatar av-s header-avatar"
                                style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                            </div>
                            <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                        </div>
                        {{-- header buttons --}}
                        <nav class="m-header-right">
                            <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                            <a href="/"><i class="fas fa-home"></i></a>
                            <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                        </nav>
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
        <div class="messenger" style="background-color: white">
            <div style="width: 70%; display: inline-block; margin: 20px; padding: 20px; background-color: #f7f7f7; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                <button id="toggleChat" class="btn btn-primary" style="display: block; margin-bottom: 20px; padding: 10px 20px; background-color: #007BFF; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Chat</button>
                <div>
                    <h2 style="font-size: 24px; margin-bottom: 20px; color: #333;">Welcome to Our Chat Dating App</h2>
                    <p style="font-size: 16px; line-height: 1.5; color: #666;">Discover the perfect match and build meaningful connections with our innovative chat dating app. Whether you're looking for romance, friendship, or casual conversations, we've got you covered.</p>
            
                    <h2 style="font-size: 20px; margin: 20px 0; color: #333;">Key Features</h2>
                    <ul style="font-size: 16px; line-height: 1.5; color: #666;">
                        <li>Instant Messaging: Connect with potential partners through real-time messaging.</li>
                        <li>Profile Matching: Find your ideal match based on shared interests and preferences.</li>
                        <li>Video Calls: Take your conversations to the next level with video calls and face-to-face interactions.</li>
                        <li>Safe and Secure: We prioritize your privacy and security, ensuring a safe dating environment.</li>
                    </ul>
            
                    <h2 style="font-size: 20px; margin: 20px 0; color: #333;">Get Started Today</h2>
                    <p style="font-size: 16px; line-height: 1.5; color: #666;">Join our vibrant community and start your journey to finding love and meaningful connections. Sign up now and explore the endless possibilities of our chat dating app.</p>
                </div>
            </div>
            
            <div style="width: 30%; display: inline-block; text-align: center;">
                <div class="messenger" id="chatContainer">
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
                                <div class="listOfContacts"
                                    style="width: 100%;height: calc(100% - 272px);position: relative;"></div>
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
                                    <div class="avatar av-s header-avatar"
                                        style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                                    </div>
                                    <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                                </div>
                                {{-- header buttons --}}
                                <nav class="m-header-right">
                                    <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                                    <a href="/"><i class="fas fa-home"></i></a>
                                    <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                                </nav>
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
    @include('components-project.footer')
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
