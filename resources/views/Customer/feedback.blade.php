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
       <form action="../storeFeedback/{{ $order->order_id }}" enctype='multipart/form-data' method="post">
        @csrf   
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                            <h3>Order Details</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Order No</th>
                                            <th>Service</th>
                                            <th>Category</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                        <td>#{{ $order->order_no }}</td>
                                            <td> {{ $order->getservice->service_name }}</td>
                                            <td>{{ $order->getservice->getcategory->category_name }}</td>
                                            
                                        </tr>
                                    </tbody>
                                </table>     
                            </div>
                       
                    </div>
                 

           
                    <div class="col-lg-6 col-md-6">
                    <h3>Your Feeback</h3> 
                    <div class="row">

<div class="col-12 mb-20">
    <label>Feedback  <span>*</span></label>
    <br>
    <textarea maxlength="500" name="feedback" rows="7" style="width:100%;" required></textarea>     
</div>


                                                   
</div>
                          
                          
                            <div class="payment_method">
                                <div class="order_button">
                                    <button  type="submit">Submit</button> 
                                </div>    
                            </div> 
                        </form>         
                    </div>
                </div> 
            </div> 
        </div>       
    </div>
    <!--Checkout page section end-->
    @include('Customer.Navigation.footer')
    
