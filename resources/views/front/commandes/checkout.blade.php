@include('front.header')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/form.css') }}">

@php
$cartItems = session('cart') ?? [];
$cartNotEmpty = count($cartItems) > 0;
$total = 0;
@endphp
<form action="{{ route('order.confirm') }}" method="post">
    @csrf
    <table id="cart" class="table table-bordered table-hover table-condensed mt-3">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:8%" class="text-center">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cartItems as $id => $details)
            @if(is_array($details))
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs">
                            <img src="public/image/Products/{{ $details['image'] }}" width="50" height="" class="img-responsive" />
                        </div>
                        <div class="col-sm-9">
                            <p class="nomargin">{{ $details['name'] }}</p>
                        </div>
                    </div>
                </td>
                <td data-th="originalPrice" class="text-center">{{ $details['originalPrice'] }}</td>
                <td data-th="Quantity">
                    <input type="number" value="{{ $details['quantity'] }}" name="quantity[]" id="quantity"
                        class="form-control quantity" />
                    <input type="hidden" name="product_ids[]" value="{{ $id }}">
                </td>
                <td data-th="Subtotal" class="text-center">${{ number_format($details['originalPrice'] * $details['quantity'],
                    2) }}</td>
            </tr>
            <?php $total += $details['originalPrice'] * $details['quantity']; ?>
            @endif
            @empty
            @if(!$cartNotEmpty)
            <tr>
                <td class="text-center" colspan="4">Your Cart is Empty.....</td>
            </tr>
            @endif
            @endforelse
        </tbody>
        <tfoot>
            @if($total > 0)
            <tr class="visible-xs">
                <td class="text-right" colspan="3"><strong>Total</strong></td>
                <td class="text-center"> ${{ number_format($total, 2) }}</td>
            </tr>
            @endif
        </tfoot>
    </table>
    <div class="d-flex justify-content-center pagination-lg">
    <div class="customer-details">
        <h2> Customer Details </h2>
        <div class="form-grp">
            <label for="">Name :</label><span class="error-message" id="name-error"></span><br>
            <input type="text" class="input-field" name="name" id="fname">
        </div>
        <div class="form-grp">
            <label for="">Email :</label><span class="error-message" id="email-error"></span><br>
            <input type="text" class="input-field" name="email" id="email">
        </div>
        <div class="form-grp">
            <label for="">Address :</label><span class="error-message" id="address-error"></span><br>
            <textarea name="address" class="input-field" id="address" cols="30" rows=""></textarea>
        </div>
    </div>
    </div>
    <br>
<div class="d-flex justify-content-center pagination-lg">
    <a href="{{ url('cart') }}" class="btn shopping-btn">Continue Shopping</a>
    <input type="submit" class="btn btn-warning check-btn" value="Confirm Order">
</div>
</form>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
                    $("form").submit(function(event) {
                            var name = $("#fname").val();
                            var email = $("#email").val();
                            var address = $("#address").val();
                            var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                            $(".error-message").html("");
                            if (name === "") {
                                $("#name-error").html("Required.");
                                event.preventDefault();
                            }
                            if (email === "") {
                                $("#email-error").html("Required.");
                                event.preventDefault();
                            } else {
                                if (!emailRegex.test(email)) {
                                    $("#email-error").html("Enter a valid email.");
                                }
                            }
                                if (address === "") {
                                    $("#address-error").html("Required.");
                                    event.preventDefault();
                                }
                            });
                    });
</script>
 @include('front.footer')
