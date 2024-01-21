@extends('admin.administrator.layout')
@section('adminPages')
    <div class="checkoutContainer">
        <div class="adminHomePageTitle">Checkout Page</div>
        <div class="checkoutWrap">
            <div class="checkoutLeftSide">
                <img class="checkoutImage" src="{{asset('images/checkout/checkout.png')}}" alt="">
            </div>
            <div class="checkoutRightSide">
                <div class="checkoutContent">
                    <div class="orderCheckoutDetailsTitle">Your Order Details:</div>
                    <div class="orderItems">
                        <div class="orderDetailLeft">Items:</div>
                        <div class="allItemsInCart">
                        @foreach($cartDetails->items as $item)
                            <div class="orderItem">
                        <div class="orderDetailRight">{{$item->title}}</div>
                            <div>-</div>
                        <div class="orderDetailRight">{{$item->quantity}}</div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="orderDetail">
                        <div class="orderDetailLeft">Total Items Qty:</div>
                        <div class="orderDetailRight">{{$cartDetails->quantities_sum}} items</div>
                    </div>
                    <div class="orderDetail">
                        <div class="orderDetailLeft">Price to Pay:</div>
                        <div class="orderDetailRight">{{$cartDetails->total}} €</div>
                    </div>
                </div>
                <form id="payment-form"  method="POST">
                    @csrf
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div id="link-authentication-element">
                        <!--Stripe.js injects the Link Authentication Element-->
                    </div>
                    <input type="hidden" name="cartTotal" id="cartTotal" value="{{$cartDetails->total}}">
                    <input type="hidden" name="cartQty" id="qty" value="{{$cartDetails->quantities_sum}}">
                    <input type="hidden" name="cartQty" id="userId" value="{{auth()->user()->id}}">
                    <label for="address">Adress:</label>
                    <input type="text" class="formInput" id="address" name="address" required>
                    <div class="input-row">
                        <label for="county">County:</label>
                        <input type="text" class="formInput" id="county" name="county" required>
                        <label for="city">City:</label>
                        <input type="text" class="formInput" id="city" name="city" required>
                    </div>
                    <label for="country">Country:</label>
                    <input type="text" id="country" class="formInput" name="country" required>

                    <div id="card-element"></div>
                    <div id="card-errors" style="color: red" role="alert"></div>
                    <button type="submit" id="submit" class="adminButton">Pay now</button>
                    <div id="payment-message" class="hidden"></div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{asset('js/stripe.js')}}"></script>
@endsection
