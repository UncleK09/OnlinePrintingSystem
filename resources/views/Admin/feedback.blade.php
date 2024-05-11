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
                                            <h2 class="nk-block-title">Feedback List</h1>
                                                <nav>
                                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                          
                                                        <li class="breadcrumb-item active" aria-current="page">Feedback Management</li>
                                                    </ol>
                                                </nav>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <ul class="d-flex">
                                                <li>
                                                  
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
                                                        <span class="overline-title">Order No</span>
                                                    </th>
                                                    <th class="tb-col">
                                                        <span class="overline-title">Service</span>
                                                    </th>
                                                    <th class="tb-col tb-col-xl">
                                                        <span class="overline-title">Feedback</span>
                                                    </th>
                                                    <th class="tb-col tb-col-xl">
                                                        <span class="overline-title">DateTime</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
@foreach($feedbacks as $key => $feedback)
                                                <tr>
                                                <td class="tb-col"><?php echo ++$key ?></td>
                                                    <td class="tb-col">{{ $feedback->getorder->order_no }}</td>
                                                    <td class="tb-col">{{ $feedback->getorder->getservice->service_name }}</td>
                                                    <td class="tb-col">{{ $feedback->feedback }}</td>
                                                    <td class="tb-col">{{ $feedback->created_at }}</td>
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