<footer style="background-color: #c63636; color: #fff; padding: 20px 0;">
    <div class="container" style="display: flex; justify-content: space-around; align-items: center;">
        <div class="footer-content" style="display: flex; align-items: center;">
            <div class="footer-logo">
                <img src="{{ asset('assets/imgs/logo.jpeg') }}" alt="Dating App Logo"
                    style="width: 60px;height:60px;border-radius:10px; margin-right:20px;">
            </div>
            <div class="footer-links" style="margin-right: 20px;">
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="display: inline; margin-right: 20px;"><a href="{{ url('/') }}"
                            style="text-decoration: none; color: #fff; font-size:20px;">Home</a></li>
                    <li style="display: inline; margin-right: 20px;"><a href="{{ url('/dashboard') }}"
                            style="text-decoration: none; color: #fff; font-size:20px;">Profile</a></li>
                    <li style="display: inline; margin-right: 20px;"><a href="{{ route('chatify') }}"
                            style="text-decoration: none; color: #fff; font-size:20px;">Chat Now</a></li>
                    <li style="display: inline;"><a href="{{ route('user.find.friends') }}"
                            style="text-decoration: none; color: #fff;font-size:20px;">Find Friends</a></li>
                    <li style="display: inline;margin-left: 20px;"><a href="{{ route('payment.packs') }}"
                            style="text-decoration: none; color: #fff;font-size:20px;">Coins</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright" style="text-align: center; font-size: 22px; margin-top: 20px;">
            &copy; {{ date('Y') }} Our Dating App. All rights reserved.
        </div>
    </div>
</footer>
