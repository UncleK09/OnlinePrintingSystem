@include('Customer.Navigation.app')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
@if($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Whoops !</strong> {{ session()->get('error') }}

</div>
@endif

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Yay !</strong> {{ session()->get('success') }}

</div>
@endif


<!--Checkout page section-->
<div class="Checkout_section mt-70">
    <div class="container">
    <form action=" " method="post">   
        <div class="checkout_form">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    
                        <h3 style="text-align:center;">My Orders</h3>

@foreach($orders as $order)
                        <div class="user-actions">
                        @if($order->order_status != 'Payment Failed' && $order->order_status != 'Pending Payment')
                    <h3 style="background-color:cornflowerblue;"> 
                    @else
                    <h3 style="background-color:red;"> 
                    @endif
                        <i class="fa fa-file-o" aria-hidden="true"></i>
                        Order ID: {{$order->order_no}} | Total Amount: RM {{ $order->total_price }} | Date & Time:{{ $order->created_at }}
                        <a class="Returning" style="color:yellow;" href="#checkout_login{{ $order->order_id }}" data-bs-toggle="collapse" aria-expanded="true">Click here to View</a>     

                    </h3>
                        <div id="checkout_login{{ $order->order_id }}" class="collapse" data-parent="#accordion">
                        <div class="checkout_info">
                        <table class="table">
<thead class="thead-dark">
<tr>
    <th scope="col">Service</th>
    <th scope="col">Category</th>
    <th scope="col">Document</th>
    <th scope="col">Amount</th>
    <th scope="col">Delivery Address</th>
    <th scope="col">Status</th>
    <th scope="col">Action</th>
</tr>
</thead>
<tbody>
<tr>
    <td>{{ $order->getservice->service_name }}</td>
    <td>{{ $order->getservice->getcategory->category_name }}</td>
    <td style="vertical-align: top;">
    <a href="{{ asset('storage/documents/'.$order->document) }}" target="_blank" style="color: blue; text-decoration: underline;">
        {{ $order->document }}
    </a>
</td>

    <td>RM {{$order->total_price}}</td>
    <td>{{$order->delivery_address}}</td>
    <td>{{$order->order_status}}</td>
    <td style="vertical-align: top;">
    @if($order->order_status == 'Delivered' && $order->feedback == 'N')
    <a type="button" class="btn btn-success" href="provideFeedback/{{ $order->order_id }}" style="color:white;">Feedback</a>
    @else
    -
    @endif
</td>
</tr>

</tbody>
</table>
    
                        </div>
                    </div>    
                </div>
@endforeach
                
                    
                </div>
                
            </div> 
        </div> 
    </div>       
</div>
<!--Checkout page section end-->
@include('Customer.Navigation.footer')

