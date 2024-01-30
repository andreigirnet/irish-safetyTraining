@extends('admin.administrator.layout')
@section('adminPages')
    <div class="dashWrapper">
        <div class="adminHomePageTitle">Search User Result</div>
        <div class="landscape">
            <img src="{{asset('images/banners/landscape.png')}}" alt="">
            <div class="landscapeText">Please rotate your phone</div>
        </div>
        <div class="searchUser">
            <div class="searchText">Search for a user</div>
            <form action="{{route('user.admin.search')}}">
                <input type="text" name="email" placeholder="Type the users email or full name or phone" required>
                <button type="submit" class="searchButton">Search</button>
            </form>
            <a href="{{route('users.index')}}">Go back to all users</a>
        </div>
        <table class="styled-table hide">
            <thead>
            <tr>
                <th>Action</th>
                <th>User Id</th>
                <th>Created At</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th class="hiddenRows">Registered By</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td class="actionRow">
                    <form action="{{route('user.delete', $user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="removeButton">
                            <img src="{{asset('images/icons/bin.png')}}" alt="">
                        </button>
                    </form>
                    <a href="{{route('user.edit', $user->id)}}" class="editLink"><img src="{{asset('images/icons/edit.png')}}" alt=""></a>
                    <a href="{{route('user.info', $user->id)}}" class="editLink"><img src="{{asset('images/icons/info.png')}}" alt=""></a>
                </td>
                <td>{{$user->id}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->unHashedPassword}}</td>
                <td class="hiddenRows">{{$user->registeredBy}}</td>
            </tr>
            @endforeach
            {{--        <tr class="active-row">--}}
            {{--            <td>Melissa</td>--}}
            {{--            <td>5150</td>--}}
            {{--        </tr>--}}
            {{--        <!-- and so on... -->--}}
            </tbody>
        </table>
    </div>
@endsection
