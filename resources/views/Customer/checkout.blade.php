@include('Customer.Navigation.app')

<!-- Include jQuery from a CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<!-- Display error and success messages -->
@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Whoops!</strong> {{ $message }}
    </div>
@endif

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Yay!</strong> {{ $message }}
    </div>
@endif

<!-- Checkout page section -->
<div class="Checkout_section mt-70">
    <div class="container">
        <form action="../storeCheckout/{{ $service->service_id }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="checkout_form">
                <div class="row">

                    <!-- Customer Details Section -->
                    <div class="col-lg-6 col-md-6">
                        <h3>Customer Details</h3>
                        <div class="row">
                            <div class="col-lg-12 mb-20">
                                <label>Full Name <span>*</span></label>
                                <input type="text" name="delivery_name" value="{{ auth()->user()->fullname }}" required>
                            </div>
                            <div class="col-12 mb-20">
                                <label>Address <span>*</span></label>
                                <textarea maxlength="500" name="delivery_address" rows="7" style="width:100%;" required>{{ auth()->user()->address }}</textarea>
                            </div>
                            <div class="col-lg-6 mb-20">
                                <label>Phone <span>*</span></label>
                                <input type="number" name="phone" value="{{ auth()->user()->phone }}" required>
                            </div>
                            <div class="col-lg-6 mb-20">
                                <label>Email Address <span>*</span></label>
                                <input type="email" name="email" value="{{ auth()->user()->email }}" required readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Printing Details Section -->
                    <div class="col-lg-6 col-md-6">
                        <h3>Printing Details</h3>
                        <div class="row">
                            <div class="col-lg-12 mb-20">
                                <label>Document <span>*</span></label>
                                <input type="file" name="document" required>
                            </div>
                            <div class="col-12 mb-20">
                                <label>Remarks (quantity and time) <span>*</span></label>
                                <textarea maxlength="500" name="remark" rows="7" style="width:100%;" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Section -->
                    <div class="col-lg-6 col-md-6">
                        <h3>Your order</h3>
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Category</th>
                                        <th>Price per Piece</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $service->service_name }}</td>
                                        <td>{{ $service->getcategory->category_name }}</td>
                                        <td>RM {{ number_format($service->service_price, 2) }}</td>
                                        <td>
                                            <input type="number" name="quantity" id="quantity" value="{{ old('quantity', 1) }}" min="1" step="1" required>
                                        </td>
                                        <td id="total-price">RM {{ number_format($service->service_price * old('quantity', 1), 2) }}</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td colspan="4" id="subtotal">RM {{ number_format($service->service_price * old('quantity', 1), 2) }}</td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Order Total</th>
                                        <td colspan="4"><strong id="order-total">RM {{ number_format($service->service_price * old('quantity', 1), 2) }}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment_method">
                            <div class="order_button">
                                <button type="submit">Pay Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@include('Customer.Navigation.footer')

<!-- Updated JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to format numbers as currency (RM)
    function formatCurrency(value) {
        return `RM ${value.toFixed(2)}`;
    }

    // Event listener for input changes on the quantity input
    const quantityInput = document.getElementById('quantity');
    const servicePrice = parseFloat('{{ $service->service_price }}');

    if (quantityInput) {
        quantityInput.addEventListener('input', function() {
            let quantity = parseInt(this.value, 10);

            // Ensure quantity is a valid number and at least 1
            if (isNaN(quantity) || quantity < 1) {
                quantity = 1;
                this.value = quantity; // Set the value to 1 if it's invalid
            }

            // Calculate the total price
            const totalPrice = servicePrice * quantity;

            // Update the total price, subtotal, and order total in the DOM
            const totalPriceElement = document.getElementById('total-price');
            const subtotalElement = document.getElementById('subtotal');
            const orderTotalElement = document.getElementById('order-total');

            if (totalPriceElement) {
                totalPriceElement.textContent = formatCurrency(totalPrice);
            }

            if (subtotalElement) {
                subtotalElement.textContent = formatCurrency(totalPrice);
            }

            if (orderTotalElement) {
                orderTotalElement.textContent = formatCurrency(totalPrice);
            }
        });
    } else {
        console.error("Element with ID 'quantity' not found.");
    }
});
</script>
