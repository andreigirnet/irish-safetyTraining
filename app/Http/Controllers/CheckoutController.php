<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Jackiedo\Cart\Cart;
use Stripe\Stripe;



class CheckoutController extends Controller
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
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $cartDetails = $this->cart->getDetails();
        return view("admin.administrator.checkout")->with('cartDetails',$cartDetails);
    }

    public function indexS(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $cartDetails = $this->cart->getDetails();
        return view("admin.administrator.checkoutS")->with('cartDetails',$cartDetails);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function setPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $json_str = file_get_contents('php://input');
        $json_obj = json_decode($json_str);
        $amountToInt = round($this->cart->getTotal() * 100, 0, PHP_ROUND_HALF_UP);
        $intent = null;
        try {
            if (isset($json_obj->payment_method_id)) {
                # Create the PaymentIntent
                $customer = \Stripe\Customer::create([
                    'email' => auth()->user()->email,
                    'description' => 'New customer',
                    'metadata' => [
                        'name' => auth()->user()->name,
                    ],
                ]);
                $intent = \Stripe\PaymentIntent::create([
                    'payment_method' => $json_obj->payment_method_id,
                    'amount' => $amountToInt,
                    'currency' => 'eur',
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                    'statement_descriptor' => 'irish-safetytraining',
                    'customer'=> $customer->id,
                    'description' => 'Payment made by '. auth()->user()->email,
                ]);
            }
            if (isset($json_obj->payment_intent_id)) {
                $intent = \Stripe\PaymentIntent::retrieve(
                    $json_obj->payment_intent_id
                );
                $intent->confirm();
            }
            $this->generateResponse($intent, $request);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            # Display error on client
            echo json_encode([
                'error' => $e->getMessage()
            ]);
        }

    }
    public function generateResponse($intent, Request $request) {
        # Note that if your API version is before 2019-02-11, 'requires_action'
        # appears as 'requires_source_action'.
        if ($intent->status == 'requires_action' &&
            $intent->next_action->type == 'use_stripe_sdk') {
            # Tell the client to handle the action
            echo json_encode([
                'requires_action' => true,
                'payment_intent_client_secret' => $intent->client_secret
            ]);
        } else if ($intent->status == 'succeeded') {
            # The payment didn’t need any additional actions and completed!
            # Handle post-payment fulfillment
            Order::create([
                'user_id' => auth()->user()->id,
                'product_name' => "Manual Handling",
                'quantity' => $this->cart->sumItemsQuantity(),
                'paid' => $this->cart->getTotal(),
                'charge_id' => $intent->id,
                'invoice_id' => $intent->id,
                'address' => $request->address,
                'city' => $request->city,
                'county' => $request->county,
                'country' => $request->country,
                'status' => 'paid',
            ]);

            $cartItems = $this->cart->getDetails()->items;

            foreach ($cartItems as $cartItem) {
                for ($i = 0; $i < $cartItem->quantity; $i++) {
                    $package = new Package();
                    $package->product_id = $cartItem->id;
                    $package->user_id = auth()->user()->id;
                    $package->course_name = $cartItem->title; // Adjust property names based on your actual data structure
                    $package->status = "purchased";
                    $package->save();
                }
            }
            $this->cart->clearItems();
            $request->session()->flash('success', 'Payment has been received successfully');
            echo json_encode([
                "success" => true
            ]);
        } else {
            # Invalid status
            http_response_code(500);
            echo json_encode(['error' => 'Invalid PaymentIntent status']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
