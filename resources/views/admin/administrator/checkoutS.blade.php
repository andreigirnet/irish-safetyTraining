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
                        <div class="orderDetailRight">{{$item->title}}</div>
                            <div>-</div>
                        <div class="orderDetailRight">{{$item->quantity}}</div>
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
                    <input type="text" id="address" name="address" class="formInput" required>
                    <div class="input-row">
                        <label for="county">County:</label>
                        <input type="text" id="county" class="formInput" name="county" required>
                        <label for="city">City:</label>
                        <input type="text" id="city" class="formInput" name="city" required>
                    </div>
                    <label for="country">Country:</label>
                    <input type="text" id="country" class="formInput" name="country" required>
                    <div class="cardS">
                        <img src="{{asset('images/icons/credit-card.png')}}" alt="">
                        <input type="number" class="inpPay" id="cn" name="cardNumber" placeholder="Card number" max="16">
                        <div class="monthYear">
                            <input type="number" class="inpPay" id="mn" name="month" placeholder="MM" max="2">
                            <span class="sep">/</span>
                            <input type="number" class="inpPay" id="yy" name="year" placeholder="YY" max="2">
                            <input type="number" class="inpPay" id="ss" name="secret" placeholder="CVC" max="3">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
