@extends('admin.administrator.layout')
@section('adminPages')
    <div class="homePageAdminContent">
        <div class="adminHomePageTitle">Courses</div>
        <div class="adminProducts">
            @foreach($products as $product)
            <div class="adminProduct">
                <img src="{{asset('images/productAdd/'.$product->image)}}" alt="" class="adminProductImage">
                <div class="adminProductBottom">
                    <div class="adminProductName">{{$product->name}}</div>
                    <div class="adminProductPrice">Price: <span style="font-weight: 600">{{$product->price}}</span>€</div>
                    <form action="{{route('basket.add')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$product->id}}" name="productId">
                        <button type="submit" class="buttonProductAdminAdd">Add To Basket</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="{{asset('js/showModalRegisterEmployee.js')}}"></script>
@endsection
