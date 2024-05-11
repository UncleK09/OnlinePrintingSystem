<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kodak Online Printing</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/printing.png">
    
    <!-- CSS 
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!--slick min css-->
    <link rel="stylesheet" href="assets/css/slick.css">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="assets/css/font.awesome.css">
    <!--ionicons css-->
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <!--linearicons css-->
    <link rel="stylesheet" href="assets/css/linearicons.css">
    <!--animate css-->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!--slinky menu css-->
    <link rel="stylesheet" href="assets/css/slinky.menu.css">
    <!--plugins css-->
    <link rel="stylesheet" href="assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!--modernizr min js here-->
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
</head>

<body>
   
    <!--header area start-->
    
    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">
                
    </div>
    
    
    <header style="background-color:#ffb700;">
        <div class="main_header">
            
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-3 col-sm-3 col-3">
                            <div class="logo" style="font-size:25px;">
                                Welcome to <B style="font-size:25px; color:brown;">Kodak Online Printing</B>
                            </div>
                        </div>
                       
                       
                    </div>
                </div>
            </div>

            </div>
        </div> 
    </header>
    <!--header area end-->
    
<!-- customer login start -->
<div class="customer_login">
        <div class="container">
            <div class="row">
            @if($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Whoops !</strong> {{ session()->get('error') }}
    
</div>
@endif

@if($message = Session::get('errors'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Whoops !</strong> {{ session()->get('errors') }}
    
</div>
@endif

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Yay !</strong> {{ session()->get('success') }}
    
</div>
@endif
               <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>Login</h2>
                        <form action="/login-user" method="POST">
                            @csrf
                            <p>   
                                <label>Email <span>*</span></label>
                                <input type="email" name="email" required>
                             </p>
                             <p>   
                                <label>Password <span>*</span></label>
                                <input type="password" name="password" required>
                             </p>   
                            <div class="login_submit">
                 
                               
                                <button type="submit" name="login">login</button>
                                
                            </div>

                        </form>
                     </div>    
                </div>

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Register</h2>
                        <form action="/register-post" method="POST">
                            @csrf
                            <p>   
                                <label>Username  <span>*</span></label>
                                <input type="text" name="username" required>
                             </p>
                             <p>   
                                <label>Email  <span>*</span></label>
                                <input type="email" name="email" required>
                             </p>
                             <p>   
                                <label>Phone  <span>*</span></label>
                                <input type="number" name="phone" required>
                             </p>
                             <p>   
                                <label>Full Name  <span>*</span></label>
                                <input type="text" name="fullname" required>
                             </p>
                             <p>   
                                <label>Address  <span>*</span></label>
                                <br>
                                <textarea name="address" maxlength="400" rows="5" style="width:100%;" required></textarea>
                             </p>
                             <p>   
                                <label>Password <span>*</span></label>
                                <input type="password" name="password" required>
                             </p>
                             <p>   
                                <label>* Use a combo of uppercase letters, lowercase letters, numbers, and even some special characters <strong></label>
                             </p>

                    
                            <div class="login_submit">
                                <button type="submit" name="register">Register</button>
                            </div>
                        </form>
                    </div>    
                </div>
                <!--register area end-->


            </div>
        </div>    
    </div>
    <!-- customer login end -->

<!--footer area start-->
<footer class="footer_widgets" style="background-color:#ffb700;">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-7">
                        <br>         <br>
                        <div class="widgets_container contact_us">
                           <div class="footer_logo">
                           <B style="font-size:19px; color:brown;">Kodak Express Digital Solutions</B>
                           </div>
                           <p class="footer_desc">Address: Jln Ismail, Mersing Kechil, 86800 Mersing, Johor</p>
                      
                        </div>          
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-7">
                        <div class="copyright_area">
                            <p>Copyright  © 2024  <a href="#">Kodak Express Digital Solutions</a>  <br>@ All Rights Reserved  <a href="#">Kodak Express Digital Solutions</a></p>
                        </div>
                    </div>    
                  
                </div>
            </div>
        </div>   
    </footer>
    <!--footer area end-->


<!-- JS
============================================ -->
<!--jquery min js-->
<script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
<!--popper min js-->
<script src="assets/js/popper.js"></script>
<!--bootstrap min js-->
<script src="assets/js/bootstrap.min.js"></script>
<!--owl carousel min js-->
<script src="assets/js/owl.carousel.min.js"></script>
<!--slick min js-->
<script src="assets/js/slick.min.js"></script>
<!--magnific popup min js-->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!--counterup min js-->
<script src="assets/js/jquery.counterup.min.js"></script>
<!--jquery countdown min js-->
<script src="assets/js/jquery.countdown.js"></script>
<!--jquery ui min js-->
<script src="assets/js/jquery.ui.js"></script>
<!--jquery elevatezoom min js-->
<script src="assets/js/jquery.elevatezoom.js"></script>
<!--isotope packaged min js-->
<script src="assets/js/isotope.pkgd.min.js"></script>
<!--slinky menu js-->
<script src="assets/js/slinky.menu.js"></script>
<!--instagramfeed menu js-->
<script src="assets/js/jquery.instagramFeed.min.js"></script>
<!-- tippy bundle umd js -->
<script src="assets/js/tippy-bundle.umd.js"></script>
<!-- Plugins JS -->
<script src="assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>




</body>

</html>