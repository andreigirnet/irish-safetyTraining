@extends('admin.administrator.layout')
@section('adminPages')
    <div class="dashWrapper">
        <div class="adminHomePageTitle">All Certificates</div>
        <div class="landscape">
            <img src="{{asset('images/banners/landscape.png')}}" alt="">
            <div class="landscapeText">Please rotate your phone</div>
        </div>
        <div class="searchUser">
            <div class="searchText">Search for a Certificate</div>
            <form action="{{route('certificates.trainer.search')}}">
                <input type="text" name="unique_id" placeholder="Type the certificate unique id">
                <button type="submit" class="searchButton">Search</button>
            </form>
        </div>
        <table class="styled-table hide">
            <thead>
            <tr>
{{--                <th>Action</th>--}}
                <th>Certificate Id</th>
                <th class="hiddenRows">Created At</th>
                <th>Holder name</th>
                <th>Holder Email</th>
                <th>Unique Id</th>
                <th>Expiration Date</th>
                <th class="hiddenRows">Package Id</th>
                <th>Certificate</th>
            </tr>
            </thead>
            <tbody>
            @if($certificates)
                @foreach($certificates as $certificate)
                    <tr>
{{--                        <td class="actionRow">--}}
{{--                            <form action="{{route('certificates.admin.delete', $certificate->id)}}" method="POST">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button class="removeButton">--}}
{{--                                    <img src="{{asset('images/icons/bin.png')}}" alt="">--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        </td>--}}
                        <td>{{$certificate->id}}</td>
                        <td class="hiddenRows">{{$certificate->created_at}}</td>
                        <td>{{$certificate->holderName}}</td>
                        <td>{{$certificate->email}}</td>
                        <td>{{$certificate->unique_id}}</td>
                        <td>{{$certificate->expiration_date}}</td>
                        <td class="hiddenRows">{{$certificate->package_id}}</td>
                        <td><a href="{{route('certificate.download', $certificate->id)}}"><img class="invoiceLink" src="{{asset('images/icons/pdf.png')}}" alt=""></a></td>
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
        {{$certificates->links('paginator.paginator')}}
    </div>
@endsection
