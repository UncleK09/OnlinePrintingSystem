@include('Customer.Navigation.app')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
@if($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Whoops !</strong> {{ session()->get('error') }}

</div>
@endif

@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Whoops !</strong> 
<br>
@foreach($errors->all() as $error)
{{ $error }}<br>
@endforeach
</div>
@endif

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Yay !</strong> {{ session()->get('success') }}

</div>
@endif


 
    <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <div class="row">
               <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>Update Profile</h2>
                        <form action="/updateprofile" method="POST">
                            @csrf
                        <p>   
                                <label>Username  <span>*</span></label>
                                <input type="text" name="username" value="{{ auth()->user()->username }}" required>
                             </p>
                             <p>   
                                <label>Full Name  <span>*</span></label>
                                <input type="text" name="fullname" value="{{ auth()->user()->fullname }}"  required>
                             </p>
                             <p>   
                                <label>Email  <span>*</span></label>
                                <input type="email" name="email" value="{{ auth()->user()->email }}" style="background-color:lightgrey;" disabled>
                             </p>
                             <p>   
                                <label>Phone <span>*</span></label>
                                <input type="number" name="phone" value="{{ auth()->user()->phone }}" required>
                             </p>
                             <p>   
                                <label>Address  <span>*</span></label>
                                <br>
                                <textarea name="address" maxlength="500" rows="5" style="width:100%;" required>{{ auth()->user()->address }}</textarea>
                             </p>
                            
                            <div class="login_submit">
                
                                <button type="submit">Update</button>
                                
                            </div>

                        </form>
                     </div>    
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Change Password</h2>
                        <form action="/changepassword" method="POST">
                            @csrf
                            <p>   
                                <label>Current Password  <span>*</span></label>
                                <input type="password" name="currentpassword" required>
                             </p>
                             <p>   
                                <label>New Password <span>*</span></label>
                                <input type="password" name="newpassword" required>
                             </p>
                             <p>   
                                <label>Confirm New Password <span>*</span></label>
                                <input type="password" name="renewpassword" required>
                             </p>
                            <div class="login_submit">
                                <button type="submit">Update Password</button>
                            </div>
                        </form>
                    </div>    
                </div>
                <!--register area end-->
            </div>
        </div>    
    </div>
    <!-- customer login end -->
@include('Customer.Navigation.footer')