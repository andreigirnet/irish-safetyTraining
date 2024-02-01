@extends('admin.administrator.layout')
@section('adminPages')
    <div class="dashWrapper">
        <div class="adminHomePageTitle">Search Package Result</div>
        <div class="landscape">
            <img src="{{asset('images/banners/landscape.png')}}" alt="">
            <div class="landscapeText">Please rotate your phone</div>
        </div>
        <div class="searchUser">
            <div class="searchText">Search for a package</div>
            <form action="{{route('packages.trainer.search')}}">
                <input type="number" name="id" placeholder="Type the package id" required>
                <button type="submit" class="searchButton">Search</button>
            </form>
            <a href="{{route('packages.trainer.index')}}">Go back to all packages</a>
        </div>
        <table class="styled-table hide">
            <thead>
            <tr>
                <th>Action</th>
                <th>User Id</th>
                <th class="hiddenRows">Created At</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created By</th>
            </tr>
            </thead>
            <tbody>
            <tr>
{{--                <td class="actionRow">--}}
{{--                    <form action="{{route('packages.admin.delete', $package->id)}}" method="POST">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button class="removeButton">--}}
{{--                            <img src="{{asset('images/icons/bin.png')}}" alt="">--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                    <a href="{{route('packages.admin.edit', $package->id)}}" class="editLink"><img src="{{asset('images/icons/edit.png')}}" alt=""></a>--}}
{{--                </td>--}}
                <td>{{$package->id}}</td>
                <td class="hiddenRows">{{$package->created_at}}</td>
                <td>{{$package->userPackageHolder}}</td>
                <td>{{$package->course_name}}</td>
                <td>{{$package->status}}</td>
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
