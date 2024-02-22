@extends('admin.administrator.layout')
@section('adminPages')
    <div class="dashWrapper">
        <div class="adminHomePageTitle">All Packages</div>
        <div class="landscape">
            <img src="{{asset('images/banners/landscape.png')}}" alt="">
            <div class="landscapeText">Please rotate your phone</div>
        </div>
        <div class="searchUser">
            <div class="searchText">Search for a Package</div>
            <form action="{{route('packages.admin.search')}}">
                <input type="number" name="id" placeholder="Type the package id" required>
                <button type="submit" class="searchButton">Search</button>
            </form>
        </div>

        <table class="styled-table hide">
            <thead>
            <tr>
                <th>Action</th>
                <th>Package Id</th>
                <th class="hiddenRows">Created At</th>
                <th>Holder Name</th>
                <th>Course Name</th>
                <th>Status</th>
                <th>paidToTrainer</th>
            </tr>
            </thead>
            <tbody>
            @if($packages)
            @foreach($packages as $package)
                <tr>
                    <td class="actionRow">
                        <form action="{{route('packages.admin.delete', $package->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="removeButton">
                                <img src="{{asset('images/icons/bin.png')}}" alt="">
                            </button>
                        </form>
                        <a href="{{route('packages.admin.edit', $package->id)}}" class="editLink"><img src="{{asset('images/icons/edit.png')}}" alt=""></a>
                    </td>
                    <td>{{$package->id}}</td>
                    <td class="hiddenRows">{{$package->created_at}}</td>
                    <td>{{$package->userPackageHolder}}</td>
                    <td>{{$package->course_name}}</td>
                    <td>{{$package->status}}</td>
                    @if($package->paidToTrainer)
                    <th><img src="{{asset('images/icons/check.png')}}" style="width: 30px" alt=""></th>
                    @else
                    <th>-</th>
                    @endif
                </tr>
            @endforeach
            {{--        <tr class="active-row">--}}
            {{--            <td>Melissa</td>--}}
            {{--            <td>5150</td>--}}
            {{--        </tr>--}}
            {{--        <!-- and so on... -->--}}
            @else
                <td>No packages</td>
            @endif
            </tbody>
        </table>
        {{$packages->links('paginator.paginator')}}
    </div>
@endsection
