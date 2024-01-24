@extends('admin.administrator.layout')
@section('adminPages')
    <div class="dashWrapper">
        <div class="adminHomePageTitle">All Users</div>
        <div class="landscape">
            <img src="{{asset('images/banners/landscape.png')}}" alt="">
            <div class="landscapeText">Please rotate your phone</div>
        </div>
        <div class="searchUser">
            <div class="searchText">Search for a user</div>
            <form action="{{route('user.admin.search')}}">
                <input type="text" name="email" placeholder="Type the users email or full name" required>
                <button type="submit" class="searchButton">Search</button>
            </form>
        </div>
        <table class="styled-table hide">
            <thead>
            <tr>
                <th>Action</th>
                <th class="hiddenRows">User Id</th>
                <th class="hiddenRows">Created At</th>
                <th class="hiddenRows">Name</th>
                <th>Email</th>
                <th class="hiddenRows">Phone</th>
                <th class="hiddenRows">Password</th>
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
                    <td class="hiddenRows">{{$user->id}}</td>
                    <td class="hiddenRows">{{$user->created_at}}</td>
                    <td class="hiddenRows">{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if($user->phone)
                    <td class="hiddenRows">{{$user->phone}}</td>
                    @else
                    <td class="hiddenRows">No record</td>
                    @endif
                    <td class="hiddenRows">{{$user->unHashedPassword}}</td>
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
        {{ $users->links('paginator.paginator') }}
    </div>
@endsection
