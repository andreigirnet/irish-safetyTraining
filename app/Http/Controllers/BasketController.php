<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Jackiedo\Cart\Cart;

class BasketController extends Controller
{
    protected Cart $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $cartItems    = $this->cart->getDetails();
        $cartTotal    = $this->cart->getTotal();
        $cartSubTotal = $this->cart->getItemsSubtotal();
        return view('admin.administrator.cart');
    }

    public function getCartItems(): string
    {
        $cartItems = $this->cart->getDetails();
        return $cartItems->toJson();
    }
    /**
     * Show the fo for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $product = Product::find($request->productId);
        $this->cart->addItem([
            'id'      =>$request->productId,
            'title'   =>$product->name,
            'price'   =>$product->price,
            'quantity'=>1
        ]);

        return back()->with('success', 'The course has been added to the cart');
    }

    public function applyDiscount(){
        $this->cart->applyAction([
            'group'      => 'Discount',
            'id'         => 1,
            'title'      => 'Sale 10%',
            'value'      => '-10%',
            'enabled'    =>  false
        ]);
    }

    public function removeDiscount(){
        $this->cart->clearActions();
    }

    /**
     * Display the specified resource.
     */
    public function show(Basket $basket): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Basket $basket): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->cart->updateItem($id, [
            'quantity' => $request->quantity,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $this->cart->clearActions();
        $this->cart->removeItem($id);

        return redirect(route('basket.index'))->with('success', "The course has been deleted");
    }
}
