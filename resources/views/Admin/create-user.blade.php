@include('Admin.Navigation.app')


<div class="nk-content">
<div class="container">
<div class="nk-content-inner">
<div class="nk-content-body">
<div class="nk-block-head">
<div class="nk-block-head-between flex-wrap gap g-2">
<div class="nk-block-head-content">
<h2 class="nk-block-title">Add User</h1>
<nav>
    <ol class="breadcrumb breadcrumb-arrow mb-0">
        <li class="breadcrumb-item" aria-current="page">Users Management</li>
        <li class="breadcrumb-item active" aria-current="page">Add User</li>
    </ol>
</nav>
</div>

</div><!-- .nk-block-head-between -->
</div><!-- .nk-block-head -->
<div class="nk-block">
<div class="card card-gutter-md">
<div class="card-body">
<div class="bio-block">
<h4 class="bio-block-title mb-4">User Details</h4>
<form action="/postUser" method="POST" class="row g-3" enctype="multipart/form-data">
    @csrf
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
    <div class="row g-3">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="fullname" class="form-label">Full Name</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" required>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <div class="form-control-wrap">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="phone" class="form-label">Phone</label>
                <div class="form-control-wrap">
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <div class="form-control-wrap">
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
        </div>
      
        
        
        <div class="col-lg-12">
            <div class="form-group">
                <label for="address" class="form-label">Address</label>
                <div class="form-control-wrap">
                    <textarea  class="form-control" id="address" name="address" maxlength="500" required></textarea>
                </div>
            </div>
        </div>

      

        <div class="col-lg-12">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-danger" type="reset">Reset</button>
        </div>
    </div>
</form>
</div><!-- .bio-block -->
</div><!-- .card-body -->
</div><!-- .card -->
</div><!-- .nk-block -->
</div>
</div>
</div>
</div> <!-- .nk-content -->

@include('Admin.Navigation.footer')