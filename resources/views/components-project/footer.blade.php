<footer style="background-color: #c63636; color: #fff; padding: 20px 0;">
    <div class="container" style="display: flex; justify-content: space-around; align-items: center;">
        <div class="footer-content" style="display: flex; align-items: center;">
            <div class="footer-logo">
                <img src="{{ asset('assets/imgs/logo.jpeg') }}" alt="Dating App Logo"
                    style="width: 60px;height:60px;border-radius:10px; margin-right:20px;">
            </div>
            <div class="footer-links" style="margin-right: 20px;">
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="display: inline; margin-right: 20px;"><a href="#"
                            style="text-decoration: none; color: #fff; font-size:20px;">Home</a></li>
                    <li style="display: inline; margin-right: 20px;"><a href="#"
                            style="text-decoration: none; color: #fff; font-size:20px;">About Us</a></li>
                    <li style="display: inline; margin-right: 20px;"><a href="#"
                            style="text-decoration: none; color: #fff; font-size:20px;">Contact</a></li>
                    <li style="display: inline;"><a href="#"
                            style="text-decoration: none; color: #fff;font-size:20px;">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright" style="text-align: center; font-size: 22px; margin-top: 20px;">
            &copy; {{ date('Y') }} Our Dating App. All rights reserved.
        </div>
    </div>
</footer>
