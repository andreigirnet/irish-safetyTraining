@extends('admin.administrator.layout')
@section('adminPages')
    <div class="dashWrapper"
         x-data="{
         cartObject:'',
         cartGetItems: function(){
            axios.get('/cart/get').then(response => {
                this.cartObject = response.data
                this.cartTotal = response.data.total
                this.cartSubTotal = response.data.items_subtotal
                this.cartTotalQty = response.data.quantities_sum
                this.cartItems = response.data.items
                if(this.cartTotalQty>24){
                this.showDiscount=true
                 }else{
                 this.showDiscount=false
                }
            }).catch(error => {
                console.error(error);
            });
         },
         cartTotal: 0,
         cartSubTotal: 0,
         discount: 10,
         showDiscount: false,
         cartTotalQty:0,
         cartItems:[],
         addQty: function(id){
            this.cartTotalQty+=1;
            axios.put('/cart/update/' + id,
            {
            quantity: this.cartItems[id].quantity + 1
            }).then(response => {
	            this.checkSale()
	            console.log(this.cartItems)
            }).catch(error => {
                console.error(error);
            });
         },
         subQty: function(id){
            if(this.cartItems[id].quantity>1){
                this.cartTotalQty-=1;
                axios.put('/cart/update/' + id,
                {
                 quantity: this.cartItems[id].quantity - 1
                }).then(response => {
                   this.checkSale()
                }).catch(error => {
                    console.error(error);
                });
            }
         },
         deleteItem: function(id){
            axios.delete('/cart/delete/' + id).then(response => {
                }).catch(error => {
                    console.error(error);
                });
                window.location.reload()
         },
         checkSale: function(){
            if(this.cartTotalQty>24){
                axios.post('/cart/add/discount')
                .then(response => {
                this.showDiscount=true
                this.cartGetItems()
                }).catch(error => {
                    console.error(error);
                });
            }else{
                 axios.post('/cart/clear/discount')
                .then(response => {
                this.showDiscount=false
                this.cartGetItems()
                }).catch(error => {
                    console.error(error);
                });
            }
         }
         }" x-init="cartGetItems">
        <div class="adminHomePageTitle">Your Basket</div>
        <table class="styled-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Cost</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <template x-for="(cartItem, index) in cartItems">
                <tr id="cartTableRow" class="cartRow">
                    <td id="cartId" x-text="cartItem.id"></td>
                    <td id="itemName" x-text="cartItem.title"></td>
                    <td id="itemCost" x-text="cartItem.price"></td>
                    <td class="qtyContainer">
                       <img class="qtyIcon" id="subQty" @click="subQty(index)"  src="{{asset('images/icons/minus.png')}}" alt="">
                          <input class="qtyInput" id="itemQty" x-model="cartItem.quantity" x-on:change="updateQty" type="number" min="0">
                        <img class="qtyIcon" id="addQty" @click="addQty(cartItem.hash)"  src="{{asset('images/icons/plus.png')}}" alt="">
                    </td>
                    <td>
                        <form x-bind:action="'{{ route("basket.delete", "") }}/' + cartItem.hash" method="POST">
                            @csrf
                            @method('DELETE')
                         <button class="deleteIcon" type="submit"><img class="qtyIcon" src="{{asset('images/icons/bin.png')}}" alt=""></button>
                        </form>
                    </td>
                </tr>
                </template>
            </tbody>
        </table>
        <div class="goToCheckOutContainer">
            <div class="checkout">
                <div class="noticeDiscount">
                    <div class="noticeDiscountHeader">Notice</div>
                    <div class="noticeText">Please notice that we'll offer a 10% discount when a company / employer will purchase 25+ courses (bulk courses will also count).<br>
                        Our payment system will apply the discount straight away when you add to your cart the amount of courses required.
                    </div>
                </div>
                <div >
                    <div class="noticeDiscountHeader">For Your Attention</div>
                    <div class="noticeText">Please, before you proceed with the payment, have a double check with the course/courses selected are the right ones you need and the quantity also.<br>
                        If by mistake you added to your basket extra courses that you don't need, please delete the items from your basket and start it again with the right selection.
                    </div>
                </div>
                <div class="goToCheckOutWrap">
                    <div class="cartSubTotal">
                        <div class="totalText">Cart Sub-Total:</div>
                        <div class="totalValue" x-text="cartSubTotal"></div>
                        <div class="euro">€</div>
                    </div>
                    <div class="discount" x-show="showDiscount">
                        <div class="totalText">Discount:</div>
                        <div class="totalValue" x-text="discount"></div>
                        <div class="euro">%</div>
                    </div>
                    <div class="cartTotal">
                        <div class="totalText">Cart Total:</div>
                        <div class="totalValue" x-text="cartTotal"></div>
                        <div class="euro">€</div>
                    </div>
                    <div class="checkOutMessage"></div>
                    <a href="/" x-bind:href="cartTotalQty>0 ? '/checkout' : '/cart'" class="linkCheckOut"><button class="adminButton" type="submit">Check Out</button></a>
                </div>
            </div>
        </div>
        <div class="checkoutAlert">
            <div class="boughtItemsInfo"></div>
            <div class="cardDetails">

            </div>
        </div>
    </div>

    <script src="{{asset('js/cart.js')}}" defer></script>
@endsection
