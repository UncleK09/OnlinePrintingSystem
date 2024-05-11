@include('Admin.Navigation.app')

<div class="nk-content">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="row g-gs">
                                    <div class="col-xxl-12">
                                        <div class="row g-gs">
                                            <div class="col-md-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex flex-column flex-sm-row-reverse align-items-sm-center justify-content-sm-between">
                                                            <div></div>
                                                            <div class="card-title mb-0 mt-4 mt-sm-0">
                                                                <h5 class="title mb-3 mb-xl-5">Total Sales</h5>
                                                                <div class="amount h1">RM <?php echo $totalsales; ?></div>
                                                                <div class="d-flex align-items-center smaller flex-wrap">
                                                                  
                                                                
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                                            <div class="col-md-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex flex-column flex-sm-row-reverse align-items-sm-center justify-content-sm-between">
                                                            <div></div>
                                                            <div class="card-title mb-0 mt-4 mt-sm-0">
                                                                <h5 class="title mb-3 mb-xl-5">New Order</h5>
                                                                <div class="amount h1"><?php echo $neworder; ?></div>
                                                                <div class="d-flex align-items-center smaller flex-wrap">
                                                                  
                                                                
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- .card -->
                                            </div><!-- .col -->

                            
                                            <div class="col-md-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex flex-column flex-sm-row-reverse align-items-sm-center justify-content-sm-between">
                                                            <div></div>
                                                            <div class="card-title mb-0 mt-4 mt-sm-0">
                                                                <h5 class="title mb-3 mb-xl-5">Confirm Order</h5>
                                                                <div class="amount h1"><?php echo $totalconfirmed; ?></div>
                                                                <div class="d-flex align-items-center smaller flex-wrap">
                                                                  
                                                                
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                           
                                            <div class="col-md-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex flex-column flex-sm-row-reverse align-items-sm-center justify-content-sm-between">
                                                            <div></div>
                                                            <div class="card-title mb-0 mt-4 mt-sm-0">
                                                                <h5 class="title mb-3 mb-xl-5">Rejected Order</h5>
                                                                <div class="amount h1"><?php echo $rejectedorder; ?></div>
                                                                <div class="d-flex align-items-center smaller flex-wrap">
                                                                  
                                                                
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- .card -->
                                            </div><!-- .col -->
        
                                        </div><!-- .row -->
                                    </div><!-- .col -->
                               
                                </div><!-- .row -->
                            </div>
                        </div>
                    </div>
                </div> <!-- .nk-content -->

               
@include('Admin.Navigation.footer')