<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Navbar with Logo Image</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.3/dist/echo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.2/socket.io.min.js"></script>
</head>

<body>
    <div class="fixed-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">
                    <img src="{{ asset('assets/imgs/logo.jpeg') }}" alt="Logo"
                        style="width: 40px; height: 40px; margin-right: 10px; border-radius: 10px;">
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav text-center">
                        <a href="{{ url('/') }}" class="nav-link" style="color: black; text-decoration: none; font-size: 20px;">Home</a>
                        <a href="{{ url('/user/profile') }}" class="nav-link" style="color: black; text-decoration: none; font-size: 20px;">Settings</a>
                        <a href="{{ route('chatify') }}" class="nav-link" style="color: black; text-decoration: none; font-size: 20px;">Chat</a>
                        <a href="{{ route('user.find.friends') }}" class="nav-link" style="color: black; text-decoration: none; font-size: 20px;">Profiles</a>
                        @if (Auth::user()->getRole() == 'moderator' || Auth::user()->getRole() == 'super-admin')
                        <a href="{{ route('profilesModerator') }}" class="nav-link" style="color: black; text-decoration: none; font-size: 20px;">
                            My Profiles</a>
                        @endif
                        <div class="nav-item" style="position: relative;">
                            <button id="notificationsButton" style="color: black; background: none; border: none;">
                                <i class="fas fa-bell" style="font-size: 24px;"></i>
                            </button>
                            <div id="notificationContainer"
                                style="display: none; position: absolute; top: 100%; right: 0; z-index: 1000; width: 300px; background-color: white;">
                                <div id="notificationContent" style="width: 100%;"></div>
                                @foreach (auth()->user()->notifications as $notification)
                                <div style="width: 100%; padding: 10px; border-bottom: 1px solid #ddd; background-color: white;">
                                    {{ $notification->data['name'] }} sent you a message <br><br>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('notificationsButton').addEventListener('click', function() {
                var notificationContainer = document.getElementById('notificationContainer');

                if (notificationContainer.style.display === 'none') {
                    notificationContainer.style.display = 'block';
                    addStaticNotifications();
                } else {
                    notificationContainer.style.display = 'none';
                }
            });

            function addStaticNotifications() {
                var notificationContent = document.getElementById('notificationContent');
                notificationContent.innerHTML = '';
            }
        });

    </script>
</body>

</html>
