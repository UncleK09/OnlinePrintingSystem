@include('Customer.Navigation.app')
   
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
    
    <!--slider area start-->
    <section class="slider_section">
        <div class="slider_area owl-carousel">
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider1.png">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider2.png">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider3.png">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->
    
   <br>   <br>   <br>
   
        
   
    
    
    <!--custom product area start-->
    <div class="custom_product_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                       <p>Recently added our store </p>
                       <h2>Featured Products</h2>
                    </div>
                </div>
            </div> 

            <!--home three bg area start-->   
    <div class=" product_five">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12 col-md-12">
                    <div class="productbg_right_side">
                        
                        <div class="product_conatiner3">
                            <div class="section_title">
                             
                            </div>
                            <div class="product_carousel product3_column3 owl-carousel">


 @foreach($services as $service)
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                  <a class="primary_img" href="#"><img src="./images/{{ $service->service_image }}" alt=""></a>
                                        <a class="secondary_img" href="#"><img src="./images/{{ $service->service_image }}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">Sale</span>
                                                    <span class="label_new">New</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="/shopnow" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a></li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                               <h4 class="product_name"><a href="#">{{ $service->service_name }}</a></h4>
                                                <p><a href="#">{{ $service->getcategory->category_name }}</a></p>
                                                <div class="price_box"> 
                                                    <span class="current_price">RM {{ $service->service_price }}</span>

                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                  
                                   
                                </div>
@endforeach
                                
                    </div>
                </div>
            </div>
        </div>
    </div>
     </div>
      </div>
    <!--home three bg area end--> 
           
        </div>
    </div>
    <!--custom product area end-->
    
    <br>    <br>    <br>



@include('Customer.Navigation.footer')