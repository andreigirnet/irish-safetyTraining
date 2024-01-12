@extends('admin.administrator.layout')
@section('adminPages')
    <div class="dashWrapper">
        <div class="adminHomePageTitle">Search Order Result</div>
        <div class="landscape">
            <img src="{{asset('images/banners/landscape.png')}}" alt="">
            <div class="landscapeText">Please rotate your phone</div>
        </div>
        <div class="searchUser">
            <div class="searchText">Search for a Order</div>
            <form action="{{route('order.search')}}">
                <input type="text" name="id">
                <button type="submit" class="searchButton">Search</button>
            </form>
            <a href="{{route('orders.index')}}">Go back to all Orders</a>
        </div>
        <table class="styled-table hide">
            <thead>
            <tr>
                <th>Acton</th>
                <th>Order Id</th>
                <th class="hiddenRows">Created At</th>
                <th>Owner</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Paid</th>
                <th>Status</th>
                <th class="hiddenRows">Address</th>
                <th class="hiddenRows">County</th>
                <th class="hiddenRows">City</th>
                <th class="hiddenRows">Country</th>
                <th>Invoice</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="actionRow">
                    <form action="{{route('order.admin.delete', $order->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="removeButton">
                            <img src="{{asset('images/icons/bin.png')}}" alt="">
                        </button>
                    </form>
                    <a href="" class="editLink"><img src="{{asset('images/icons/edit.png')}}" alt=""></a>
                    <a href="" class="editLink"><img src="{{asset('images/icons/info.png')}}" alt=""></a>
                </td>
                <td>{{$order->id}}</td>
                <td class="hiddenRows">{{$order->created_at}}</td>
                <td>{{$order->owner_email}}</td>
                <td>{{$order->product_name}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->paid}}</td>
                <td>{{$order->status}}</td>
                <td class="hiddenRows">{{$order->address}}</td>
                <td class="hiddenRows">{{$order->county}}</td>
                <td class="hiddenRows">{{$order->city}}</td>
                <td class="hiddenRows">{{$order->country}}</td>
                <td><a href="{{route('invoice.download',$order->id)}}"><img class="invoiceLink" src="{{asset('images/icons/pdf.png')}}" alt=""></a></td>
            </tr>
            {{--        <tr class="active-row">--}}
            {{--            <td>Melissa</td>--}}
            {{--            <td>5150</td>--}}
            {{--        </tr>--}}
            {{--        <!-- and so on... -->--}}
            </tbody>
        </table>
    </div>
@endsection
