{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div id="navbar" style="position: fixed; top: 0; width: 100%; transition: background-color 0.3s; z-index: 1000; background-color: transparent; height: 80px; display: flex; justify-content: space-between; align-items: center;">
    <div style="display: flex; align-items: center; margin-left: 20px;">
        <img src="{{ asset('assets/imgs/logo.jpeg') }}" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px; border-radius: 10px;">
        <a href="{{ url('/') }}" style="color: #fff; text-decoration: none; margin: 0 10px; font-size: 20px;">Home</a>
        <a href="{{ url('/dashboard') }}" style="color: #fff; text-decoration: none; margin: 0 10px; font-size: 20px;">Profile</a>
        <a href="{{ route('chatify') }}" style="color: #fff; text-decoration: none; margin: 0 10px; font-size: 20px;">Chat Now</a>
        <a href="{{ route('user.find.friends') }}" style="color: #fff; text-decoration: none; margin: 0 10px; font-size: 20px;">Find Friends</a>
        <a href="{{ route('payment.packs') }}" style="color: #fff; text-decoration: none; margin: 0 10px; font-size: 20px;">Coins</a>
    </div>
    @auth
    <div style="display: flex; align-items: center; margin-right: 20px;">
        <i class="fas fa-coins" style="color: gold;"></i>
        <a href="#" style="color: #fff; text-decoration: none; margin: 0 10px; font-size: 20px;">{{ Auth::user()->coins }}</a>
    </div>
    @endauth
</div>
<script>
    window.onscroll = function() {
        var navbar = document.getElementById("navbar");

        if (window.pageYOffset > 0) {
            navbar.style.backgroundColor = "#c63636";
        } else {
            navbar.style.backgroundColor = "transparent";
        }
    };
</script>

 --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Navbar with Logo Image</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .fixed-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background-color: white;
            transition: background-color 0.3s;
        }
    </style>
</head>

<body>
    <div class="fixed-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                    <div class="navbar-nav">
                        <a href="{{ url('/') }}"
                            style="color: black; text-decoration: none; margin: 0 10px; font-size: 20px;">Home</a>
                        <a href="{{ url('/user/profile') }}"
                            style="color: black; text-decoration: none; margin: 0 10px; font-size: 20px;">Profile</a>
                        <a href="{{ route('chatify') }}"
                            style="color: black; text-decoration: none; margin: 0 10px; font-size: 20px;">Chat Now</a>
                        <a href="{{ route('user.find.friends') }}"
                            style="color: black; text-decoration: none; margin: 0 10px; font-size: 20px;">Find
                            Friends</a>
                            @if (Auth::user()->getRole() == 'moderator' || Auth::user()->getRole() == 'super-admin')
                        <a href="{{ route('profilesModerator') }}"
                            style="color: black; text-decoration: none; margin: 0 10px; font-size: 20px;">
                            My Profiles</a>
                            @endif
                    </div>
                    <div class="navbar-nav ms-auto">
                        <form method="GET" action="{{ route('user.find.friends.search') }}"
                            class="d-flex justify-content-center align-items-center">
                            <div class="form-group" style="margin-bottom: 0;">
                                <input type="text" name="search" class="form-control" placeholder="Search">
                            </div>
                            <button class="btn btn-primary" type="submit" style="margin-bottom: 0;">Search</button>
                        </form>

                        <a href="{{ route('payment.packs') }}"
                            style="color: black; text-decoration: none; margin: 0 10px; font-size: 20px;"> <i
                                class="fas fa-coins" style="color: gold;"></i> {{ Auth::user()->coins }} Buy Coins</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</body>

</html>
