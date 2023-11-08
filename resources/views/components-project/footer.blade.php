<footer class="bg-primary text-white py-5">
  <div class="container">
      <div class="row">
          <div class="col-md-3 col-12">
              <div class="footer-logo text-center">
                  <img src="{{ asset('assets/imgs/logo.jpeg') }}" alt="Dating App Logo" class="img-fluid rounded-circle" style="width: 80px; height: 80px;">
              </div>
          </div>
          <div class="col-md-6 col-12 text-center mt-3 mt-md-0">
              <ul class="list-unstyled d-flex justify-content-center">
                  <li class="mx-4"><a href="{{ url('/') }}" class="text-white text-decoration-none">Home</a></li>
                  <li class="mx-4"><a href="{{ url('/dashboard') }}" class="text-white text-decoration-none">Profile</a></li>
                  <li class="mx-4"><a href="{{ route('chatify') }}" class="text-white text-decoration-none">Chat Now</a></li>
                  <li class="mx-4"><a href="{{ route('user.find.friends') }}" class="text-white text-decoration-none">Find Friends</a></li>
                  <li class="mx-4"><a href="{{ route('payment.packs') }}" class="text-white text-decoration-none">Coins</a></li>
              </ul>
          </div>
          <div class="col-md-3 col-12 mt-3 mt-md-0">
              <div class="copyright text-center">
                  &copy; {{ date('Y') }} Our Dating App. All rights reserved.
              </div>
          </div>
      </div>
      <div class="row mt-4">
          <div class="col-md-12 text-center">
              <p>Connect with us on social media:</p>
              <a href="#" class="text-white mx-2"><i class="fab fa-facebook"></i></a>
              <a href="#" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
              <a href="#" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
              <a href="#" class="text-white mx-2"><i class="fab fa-linkedin"></i></a>
              <a href="#" class="text-white mx-2"><i class="fab fa-pinterest"></i></a>
          </div>
      </div>
  </div>
</footer>
<style>
  body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
  }

  footer {
      margin-top: auto;
  }
</style>
