@include ('web.style.header')

<div class="breadcrumbs">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-md-6 col-12">
<div class="breadcrumbs-content">
<h1 class="page-title">Registration</h1>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<ul class="breadcrumb-nav">
<li><a href="{{route('webs/login')}}"><i class="lni lni-home"></i> Home</a></li>
<li>Registration</li>
</ul>
</div>
</div>
</div>
</div>


<div class="account-login section">
<div class="container">
<div class="row">
<div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
<div class="register-form">
<div class="title">
<h3>No Account? Register</h3>
<p>Registration takes less than a minute but gives you full control over your orders.</p>
</div>
@if (Session::has('successfully'))
<div class="alert alert-danger">
    {{Session::get('successfully')}}
</div>
@endif
<form class="row" method="POST" action="{{route('webs/data_register')}}">
 @csrf
<div class="col-sm-12">
<div class="form-group">
<label for="username">Username</label>
<input class="form-control" name="name" type="text" id="username" required>
@error('name')
<div style="color:red;">{{$message}}</div>
@enderror
</div>
</div>
<div class="col-sm-12">
<div class="form-group">
<label for="email">E-mail Address</label>
<input class="form-control" name="email" type="email" id="email" required>
</div>
</div>
<div class="col-sm-12">
<div class="form-group">
<label for="password">Password</label>
<input class="form-control" name="password" type="password" id="password" required>
</div>
</div>
<div class="col-sm-12">
<div class="form-group">
<label for="reg-pass-confirm">Confirm Password</label>
<input class="form-control" name="password_confirmation" type="password" id="reg-pass-confirm" required>
</div>
</div>
<div class="button">
<button class="btn" type="submit">Register</button>
</div>
<p class="outer-link">Already have an account? <a href="{{route('webs/login')}}">Login Now</a>
</p>
</form>
</div>
</div>
</div>
</div>
</div>


<footer class="footer">

<div class="footer-top">
<div class="container">
<div class="inner-content">
<div class="row">
<div class="col-lg-3 col-md-4 col-12">
<div class="footer-logo">
<a href="index-2.html">
<img src="{{asset('web/images/logo/white-logo.svg')}}" alt="#">
</a>
</div>
</div>
<div class="col-lg-9 col-md-8 col-12">
<div class="footer-newsletter">
<h4 class="title">
Subscribe to our Newsletter
<span>Get all the latest information, Sales and Offers.</span>
</h4>
<div class="newsletter-form-head">
<form action="#" method="get" target="_blank" class="newsletter-form">
<input name="EMAIL" placeholder="Email address here..." type="email">
<div class="button">
<button class="btn">Subscribe<span class="dir-part"></span></button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="footer-middle">
<div class="container">
<div class="bottom-inner">
<div class="row">
<div class="col-lg-3 col-md-6 col-12">

<div class="single-footer f-contact">
<h3>Get In Touch With Us</h3>
<p class="phone">Phone: +1 (900) 33 169 7720</p>
<ul>
<li><span>Monday-Friday: </span> 9.00 am - 8.00 pm</li>
<li><span>Saturday: </span> 10.00 am - 6.00 pm</li>
</ul>
<p class="mail">
<a href="https://demo.graygrids.com/cdn-cgi/l/email-protection#671412171708151327140f081700150e03144904080a"><span class="__cf_email__" data-cfemail="4f3c3a3f3f203d3b0f3c27203f283d262b3c612c2022">[email&#160;protected]</span></a>
</p>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="single-footer our-app">
<h3>Our Mobile App</h3>
<ul class="app-btn">
<li>
<a href="javascript:void(0)">
<i class="lni lni-apple"></i>
<span class="small-title">Download on the</span>
<span class="big-title">App Store</span>
</a>
</li>
<li>
<a href="javascript:void(0)">
<i class="lni lni-play-store"></i>
<span class="small-title">Download on the</span>
<span class="big-title">Google Play</span>
</a>
</li>
</ul>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="single-footer f-link">
<h3>Information</h3>
<ul>
<li><a href="javascript:void(0)">About Us</a></li>
<li><a href="javascript:void(0)">Contact Us</a></li>
<li><a href="javascript:void(0)">Downloads</a></li>
<li><a href="javascript:void(0)">Sitemap</a></li>
<li><a href="javascript:void(0)">FAQs Page</a></li>
</ul>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="single-footer f-link">
<h3>Shop Departments</h3>
<ul>
<li><a href="javascript:void(0)">Computers & Accessories</a></li>
<li><a href="javascript:void(0)">Smartphones & Tablets</a></li>
<li><a href="javascript:void(0)">TV, Video & Audio</a></li>
<li><a href="javascript:void(0)">Cameras, Photo & Video</a></li>
<li><a href="javascript:void(0)">Headphones</a></li>
</ul>
</div>

</div>
</div>
</div>
</div>
</div>


<div class="footer-bottom">
<div class="container">
<div class="inner-content">
<div class="row align-items-center">
<div class="col-lg-4 col-12">
<div class="payment-gateway">
<span>We Accept:</span>
<img src="{{asset('web/images/footer/credit-cards-footer.png')}}" alt="#">
</div>
</div>
<div class="col-lg-4 col-12">
<div class="copyright">
<p>Designed and Developed by<a href="https://graygrids.com/" rel="nofollow" target="_blank">GrayGrids</a></p>
</div>
</div>
<div class="col-lg-4 col-12">
<ul class="socila">
<li>
<span>Follow Us On:</span>
</li>
<li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
<li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
<li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
<li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>

</footer>


<a href="#" class="scroll-top">
<i class="lni lni-chevron-up"></i>
</a>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{asset('web/js/bootstrap.min.js')}}"></script>
<script src="{{asset('web/js/tiny-slider.js')}}"></script>
<script src="{{asset('web/js/glightbox.min.js')}}"></script>
<script src="{{asset('web/js/main.js')}}"></script>
</body>

<!-- Mirrored from demo.graygrids.com/themes/shopgrids/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Dec 2022 23:35:59 GMT -->
</html>