@include('Admin.Navigation.app-inner')
<style>
    .addmargintop {
        margin-top: 20px;
    }
</style>
<div class="nk-content" style="margin-top:50px;">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-between flex-wrap gap g-2">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title">View Order</h2>
                            <nav>
                                <ol class="breadcrumb breadcrumb-arrow mb-0">
                                    <li class="breadcrumb-item" aria-current="page">Order Management</li>
                                    <li class="breadcrumb-item active" aria-current="page">View Order</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card card-gutter-md">
                        <div class="card-body">
                            <div class="bio-block">
                                <form action="#" method="POST" class="row g-3" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 addmargintop">
                                            <h3>Delivery Details</h3>
                                            <div class="row">
                                                <div class="col-lg-12 mb-20 addmargintop">
                                                    <label class="form-group">Full Name</label>
                                                    <input type="text" class="form-control" name="delivery_name" value="{{ $order->delivery_name }}" disabled>
                                                </div>
                                                <div class="col-12 mb-20 addmargintop">
                                                    <label>Address</label>
                                                    <br>
                                                    <textarea maxlength="500" class="form-control" name="delivery_address" rows="7" style="width:100%;" disabled>{{ $order->delivery_address }}</textarea>
                                                </div>
                                                <div class="col-lg-6 mb-20 addmargintop">
                                                    <label>Phone</label>
                                                    <input type="number" class="form-control" name="phone" value="{{ $order->phone }}" disabled>
                                                </div>
                                                <div class="col-lg-6 mb-20 addmargintop">
                                                    <label>Email Address</label>
                                                    <input type="email" class="form-control" name="email" value="{{ $order->email }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="addmargintop">
                                        <div class="col-lg-6 col-md-6 addmargintop">
                                            <h3>Printing Details</h3>
                                            <div class="row">
                                                <div class="col-lg-12 mb-20 addmargintop">
                                                    <label>Document</label>
                                                    <br>
                                                    <a class="btn btn-warning" href="{{ asset('storage/documents/' . $order->document) }}" target="_blank">View/Download Document</a>
                                                </div>
                                                <div class="col-12 mb-20 addmargintop">
                                                    <label>Remarks (quantity and time)</label>
                                                    <br>
                                                    <textarea class="form-control" maxlength="500" name="remark" rows="7" style="width:100%;" disabled>{{ $order->remark }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 addmargintop">
                                            <h3>Your order</h3>
                                            <div class="order_table table-responsive">
                                                <table class="table" data-nk-container="table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th>Service</th>
                                                            <th>Category</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th> <!-- New column for quantity -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $order->getservice->service_name }}</td>
                                                            <td>{{ $order->getservice->getcategory->category_name }}</td>
                                                            <td>RM {{ number_format($order->getservice->service_price, 2) }}</td>
                                                            <td>{{ $order->quantity }}</td> <!-- Display the quantity -->
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Subtotal</th>
                                                            <td>RM {{ number_format($order->total_price, 2) }}</td>
                                                        </tr>
                                                        <tr class="order_total">
                                                            <th>Order Total</th>
                                                            <td><strong>RM {{ $order->total_price }}</strong></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- .bio-block -->
                        </div> <!-- .card-body -->
                    </div> <!-- .card -->
                </div> <!-- .nk-block -->
            </div>
        </div>
    </div>
</div> <!-- .nk-content -->

@include('Admin.Navigation.footer-inner')
