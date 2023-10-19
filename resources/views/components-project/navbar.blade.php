<div id="navbar"
    style="position: fixed; top: 0; width: 100%; transition: background-color 0.3s; z-index: 1000; background-color: transparent; height: 80px; display: flex; justify-content: space-between; align-items: center;">
    <div style="display: flex; align-items: center; margin-left: 20px;">
        <img src="{{ asset('assets/imgs/logo.jpeg') }}"alt="Logo"
            style="width: 40px; height: 40px; margin-right: 10px; border-radius:10px;">
        <a href="{{ url('/') }}" style="color: #fff; text-decoration: none; margin: 0 10px; font-size:20px;">Home</a>
        <a href="{{ url('/dashboard') }}" style="color: #fff; text-decoration: none; margin: 0 10px; font-size:20px;">Profile</a>
        <a  href="{{ route('chatify') }}" style="color: #fff; text-decoration: none; margin: 0 10px; font-size:20px;">Chat Now</a>
        <a href="{{ route('user.find.friends') }}" style="color: #fff; text-decoration: none; margin: 0 10px; font-size:20px;">Find Friends</a>
        <a href="{{ route('payment.packs') }}" style="color: #fff; text-decoration: none; margin: 0 10px; font-size:20px;">Coins</a>
    </div>
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
