<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $products = Product::orderBy('id', 'asc')->get();
        return view('admin.administrator.products', compact('products'));
    }

    public function info(): Response
    {
        $data = DB::select("SELECT sum(paid) as total FROM orders");
        $converted = $data[0]->total;
        dd($converted);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('admin.admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required'
        ]);
        $status = $request->has('status') ? 1 : 0;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/productAdd'), $imageName);
        $price = floatval($request->input('price'));
        // Create a new Product instance
        $product = new Product([
            'name' => $request->input('product_name'),
            'image' => $imageName,
            'durationTraining' => $request->input('duration'),
            'certificateValidity' => $request->input('validity'),
            'trainer'=> $request->trainer,
            'status' => $status,
            'price' => $price,
            'description' => $request->input('description'),
        ]);

        $product->save();
        return redirect(route('admin.products'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('front.product')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        //
    }
}
