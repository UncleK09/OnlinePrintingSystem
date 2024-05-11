@include('Admin.Navigation.app')

<style>
    .dataTable-container{
        min-height:200px;
    }
</style>

   
                <div class="nk-content">
                    <div class="container">
                        <div class="nk-content-inner">
                            <br>       <br>
                            <div class="nk-content-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-between flex-wrap gap g-2">
                                        <div class="nk-block-head-content">
                                            <h2 class="nk-block-title">Users List</h1>
                                                <nav>
                                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                          
                                                        <li class="breadcrumb-item active" aria-current="page">Users Management</li>
                                                    </ol>
                                                </nav>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <ul class="d-flex">
                                                <li>
                                                    <a href="/create-user" class="btn btn-primary d-none d-md-inline-flex">
                                                        <em class="icon ni ni-plus"></em>
                                                        <span>Add User</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- .nk-block-head-between -->
                                </div><!-- .nk-block-head -->
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
                                <div class="nk-block dtble">
                                    <div class="card">
                                        <table class="datatable-init table" data-nk-container="table-responsive">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="tb-col">
                                                        <span class="overline-title">No</span>
                                                    </th>
                                                    <th class="tb-col">
                                                        <span class="overline-title">Name</span>
                                                    </th>
                                                    <th class="tb-col">
                                                        <span class="overline-title">Full Name</span>
                                                    </th>
                                                    <th class="tb-col tb-col-xl">
                                                        <span class="overline-title">Email</span>
                                                    </th>
                                                    <th class="tb-col tb-col-xl">
                                                        <span class="overline-title">Address</span>
                                                    </th>
                                                    <th class="tb-col">
                                                        <span class="overline-title">Last Update</span>
                                                    </th>
                                                    <th class="tb-col tb-col-end" data-sortable="false">
                                                        <span class="overline-title">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
@foreach($users as $key => $user)
                                                <tr>
                                                <td class="tb-col"><?php echo ++$key ?></td>
                                                    <td class="tb-col"><?php echo $user["username"] ?></td>
                                                    <td class="tb-col"><?php echo $user["fullname"] ?></td>
                                                    <td class="tb-col"><?php echo $user["email"] ?></td>
                                                    <td class="tb-col"><?php echo $user["address"] ?></td>
                                                    <td class="tb-col"><?php echo $user["updated_at"] ?></td>
                                                   
                                                    <td class="tb-col tb-col-end">
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-sm btn-icon btn-zoom me-n1" data-bs-toggle="dropdown">
                                                                <em class="icon ni ni-more-v"></em>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-top">
                                                                <div class="dropdown-content py-1">
                                                                    <ul class="link-list link-list-hover-bg-primary link-list-md">
                                                                        <li>
                                                                            <a href="edit-user/<?php echo $user["id"] ?>"><em class="icon ni ni-edit"></em><span>Edit</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="delete-user/<?php echo $user["id"] ?>" onclick="return confirm('Are you sure want remove this User?');"><em class="icon ni ni-trash"></em><span>Delete</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="view-user/<?php echo $user["id"] ?>"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div><!-- dropdown -->
                                                    </td>
                                                </tr>
@endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div> <!-- .nk-content -->
          
@include('Admin.Navigation.footer')