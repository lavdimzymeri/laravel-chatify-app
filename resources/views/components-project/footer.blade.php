<footer style="background-color: #c63636; color: #fff; padding: 20px 0;">
    <div class="container" style="display: flex; flex-wrap: wrap; justify-content: space-around; align-items: center; text-align: center;">

        <div class="footer-content" style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center; width: 100%; margin-bottom: 20px;">
            <div class="footer-logo" style="width: 60px; height: 60px; border-radius: 10px; margin-right: 20px;">
                <img src="{{ asset('assets/imgs/logo.jpeg') }}" alt="Dating App Logo" style="width: 100%; height: 100%; border-radius: 10px;">
            </div>
            <div class="footer-links" style="margin-right: 20px;">
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="display: block; margin-bottom: 10px;"><a href="{{ url('/') }}" style="text-decoration: none; color: #fff; font-size: 20px;">Home</a></li>
                    <li style="display: block; margin-bottom: 10px;"><a href="{{ url('/dashboard') }}" style="text-decoration: none; color: #fff; font-size: 20px;">Profile</a></li>
                    <li style="display: block; margin-bottom: 10px;"><a href="{{ route('chatify') }}" style="text-decoration: none; color: #fff; font-size: 20px;">Chat Now</a></li>
                    <li style="display: block; margin-bottom: 10px;"><a href="{{ route('user.find.friends') }}" style="text-decoration: none; color: #fff; font-size: 20px;">Find Friends</a></li>
                    <li style="display: block;"><a href="{{ route('payment.packs') }}" style="text-decoration: none; color: #fff; font-size: 20px;">Coins</a></li>
                </ul>
            </div>
        </div>
        
        <div class="copyright" style="text-align: center; font-size: 22px; width: 100%;">
            &copy; {{ date('Y') }} Our Dating App. All rights reserved.
        </div>
    </div>
</footer>
