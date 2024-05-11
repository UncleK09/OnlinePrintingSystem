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
    

<style>
    .select-wrapper {
    display: inline-block;
    margin-right: 10px; /* Adjust margin as needed */
}

</style>
    <!--shop  area start-->
    <div class="shop_area shop_reverse mt-70 mb-70">
        <div class="container">
            <div class="row">
       
                
                <div class="col-lg-12 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">
                    <form action=" " method="POST">
                        @csrf
                        <div class="select-wrapper">
        <select class="form-control" name="categoryfilter" id="categoryfilter">
            <option value="all" {{ $categoryfilter == 'all' ? 'selected' : '' }}>All Category</option>
            @foreach($category as $cat)
            <option value="{{$cat->id}}" {{ $categoryfilter == $cat->id ? 'selected' : '' }}>{{ $cat->category_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="select-wrapper">
        <select class="form-control" name="pricerange" id="pricerange">
            <option value="all" {{ $price == 'all' ? 'selected' : '' }}>All Price Range</option>
            <option value="0-5" {{ $price == '0-5' ? 'selected' : '' }}>RM 0.00 - RM 5.00</option>
            <option value="5-10" {{ $price == '5-10' ? 'selected' : '' }}>RM 5.00 - RM 10.00</option>
            <option value="10-20" {{ $price == '10-20' ? 'selected' : '' }}>RM 10.00 - RM 20.00</option>
            <option value="20-50" {{ $price == '20-50' ? 'selected' : '' }}>RM 20.00 - RM 50.00</option>
            <option value="50-80" {{ $price == '50-80' ? 'selected' : '' }}>RM 50.00 - RM 80.00</option>
            <option value="80-1000" {{ $price == '80-1000' ? 'selected' : '' }}>RM 80.00 - RM 1000.00</option>
        </select>
    </div>
    <div class="select-wrapper">
        <button type="submit" class="btn btn-success" name="submit_filter">Filter</button>
        <a type="button" href="/shopnow" class="btn btn-danger" name="submit_reset">Reset</a>
    </div>
</form>
                    </div>

                        <div class=" niceselect_option">
                         
                               <input type="text" name="search" id="filter" style="width:300px;" placeholder="Search Here..">
                
                        </div>
                       
                    </div>
                     <!--shop toolbar end-->
                     <div class="row shop_wrapper">

                     @foreach($services as $service)
                        <div class="col-lg-3 col-md-3 col-sm-3 col-12 ">
                            <div class="single_product">
                                <div class="product_thumb">
                                        <a class="primary_img" href="#"><img src="./images/{{ $service->service_image }}" alt=""></a>
                                        <a class="secondary_img" href="#"><img src="./images/{{ $service->service_image }}" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">Sale</span>
                                            <span class="label_new">New</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                            <li class="add_to_cart"><a href="checkout/{{ $service->service_id }}" data-tippy="Checkout" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                <div class="product_content grid_content">
                                <h4 class="product_name"><a href="#">{{ $service->service_name }}</a></h4>
                                                <p><a href="#">{{ $service->getcategory->category_name }}</a></p>
                                                <div class="price_box"> 
                                                    <span class="current_price">RM {{ $service->service_price }}</span>

                                                </div>
                                    </div>
               
                            </div>
                        </div>
                        @endforeach
                       
                    </div>
<br> <br>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->
<script>
    $(document).ready(function(){
    $("#filter").keyup(function(){
 
        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(), count = 0;
 
        // Loop through the comment list
        $(".col-md-3").each(function(){
 
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();
 
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
                count++;
            }
        });

    });
});
  </script>


@include('Customer.Navigation.footer')