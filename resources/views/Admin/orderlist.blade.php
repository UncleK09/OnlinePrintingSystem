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
                                            <h2 class="nk-block-title">Order List</h1>
                                                <nav>
                                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                                        <li class="breadcrumb-item active" aria-current="page">Order Management</li>
                                                    </ol>
                                                </nav>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <ul class="d-flex">
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
                                                        <span class="overline-title">Order ID</span>
                                                    </th>
                                                    <th class="tb-col">
                                                        <span class="overline-title">Customer Name</span>
                                                    </th>
                                                    <th class="tb-col tb-col-xl">
                                                        <span class="overline-title">Service</span>
                                                    </th>
                                                    <th class="tb-col tb-col-xl">
                                                        <span class="overline-title">Status</span>
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
@foreach($orders as $key => $order)
                                                <tr>
                                                <td class="tb-col"><?php echo ++$key ?></td>
                                                    <td class="tb-col">{{ $order->order_no }}</td>
                                                    <td class="tb-col">{{ $order->delivery_name }}</td>
                                                    <td class="tb-col">{{ $order->getservice->service_name }}<br>{{ $order->getservice->getcategory->category_name }}</td>
                                                    <td class="tb-col">
                                                        @if($order->order_status != 'Payment Failed' && $order->order_status != 'Pending Payment')
                                                    <form id="updateOrderStatusForm" action="updateOrderStatus/{{ $order->order_id }}" method="POST">
    @csrf
    <select class="form-control" name="order_status" onchange="this.form.submit()">
        <option value="Order Placed" {{ $order->order_status == 'Order Placed' ? 'selected' : '' }}>Order Placed</option>
        <option value="Confirmed" {{ $order->order_status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
        <option value="Rejected" {{ $order->order_status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
        <option value="Printing in progress" {{ $order->order_status == 'Printing in progress' ? 'selected' : '' }}>Printing in progress</option>
        <option value="Pre transit" {{ $order->order_status == 'Pre transit' ? 'selected' : '' }}>Pre transit</option>
        <option value="In Transit" {{ $order->order_status == 'In Transit' ? 'selected' : '' }}>In Transit</option>
        <option value="Out for delivery" {{ $order->order_status == 'Out for delivery' ? 'selected' : '' }}>Out for delivery</option>
        <option value="Failed delivery attempt" {{ $order->order_status == 'Failed delivery attempt' ? 'selected' : '' }}>Failed delivery attempt</option>
        <option value="Waiting for delivery" {{ $order->order_status == 'Waiting for delivery' ? 'selected' : '' }}>Waiting for delivery</option>
        <option value="Delivered" {{ $order->order_status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
    </select>
</form>
@else
<b style="color: red;">{{ $order->order_status }}</b>
@endif


                                                    </td>
                                                    <td class="tb-col">{{ $order->updated_at }}</td>
                                                   
                                                    <td class="tb-col tb-col-end">
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-sm btn-icon btn-zoom me-n1" data-bs-toggle="dropdown">
                                                                <em class="icon ni ni-more-v"></em>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-top">
                                                                <div class="dropdown-content py-1">
                                                                    <ul class="link-list link-list-hover-bg-primary link-list-md">
                                                                   
                                                                        <li>
                                                                            <a href="view-order/{{ $order->order_id }}"><em class="icon ni ni-eye"></em><span>View</span></a>
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
                <script>
    document.getElementById('updateOrderStatusForm').addEventListener('change', function() {
        this.submit();
    });
</script>
@include('Admin.Navigation.footer')