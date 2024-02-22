<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Stripe\Invoice;
use Stripe\Stripe;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $orders = Order::latest()->where('user_id', auth()->user()->id)->simplePaginate(10);
        return view('admin.administrator.orders')->with('orders',$orders);
    }

    public function allOrders(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $orders = DB::select("SELECT *, orders.user_id as owner_id, (SELECT email FROM users WHERE id=owner_id) as owner_email FROM orders ORDER BY created_at DESC");
        $page = $request->input('page', 1);
        $size = 10;
        $collectedData = collect($orders);
        $paginationData = new LengthAwarePaginator(
            $collectedData->forPage($page, $size),
            $collectedData->count(),
            $size,
            $page
        );
        $paginationData->setPath('/admin/orders');
        return view('admin.admin.orders.index')->with('orders',$paginationData);
    }

    public function trainerOrders(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $orders = DB::select("SELECT *, orders.user_id as owner_id, (SELECT email FROM users WHERE id=owner_id) as owner_email FROM orders ORDER BY created_at DESC");
        $page = $request->input('page', 1);
        $size = 10;
        $collectedData = collect($orders);
        $paginationData = new LengthAwarePaginator(
            $collectedData->forPage($page, $size),
            $collectedData->count(),
            $size,
            $page
        );
        $paginationData->setPath('/trainer/orders');
        return view('admin.trainer.orders.index')->with('orders',$paginationData);
    }


    public function searchOrder(Request $request)
    {
        $order= DB::select("SELECT *, orders.user_id as owner_id, (SELECT email FROM users WHERE id=owner_id) as owner_email FROM orders WHERE id=" . $request->id);
        if ($order === []){
            return redirect()->back()->with('success', 'No record has been found with this id');
        }
            return view('admin.admin.orders.search')->with('order',$order[0]);
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
    public function store(Request $request): RedirectResponse
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('admin.admin.orders.edit')->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|max:50',
            'address'  => 'required',
            'county'   => 'required',
            'city'     => 'required',
            'country'  => 'required'
        ]);
        $order = Order::find($id);
        $order->update([
            'quantity'=>$request->quantity,
            'address' =>$request->address,
            'county'  =>$request->county,
            'city'    =>$request->city,
            'country' =>$request->country
        ]);
        return redirect(route('orders.index'))->with('success','Order has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::statement("DELETE FROM orders WHERE id=".$id);
        return redirect(route('order.index'))->with('success','Order has been removed');
    }

    public function adminDeleteOrder($id)
    {
        DB::statement("DELETE FROM orders WHERE id=".$id);
        return redirect(route('orders.index'))->with('success','Order has been removed');
    }
}
