@extends('admin.administrator.layout')
@section('adminPages')
    <div class="dashWrapper">
        <div class="adminHomePageTitle">Packages</div>
        @if(count($packages))
        <table class="styled-table">
            <thead>
            <tr>
                <th>Action</th>
                <th class="hiddenRows">Package ID</th>
                <th>Course Name</th>
                <th class="hiddenRows">Status</th>
                <th>Certificate</th>
            </tr>
            </thead>
            <tbody>
            @foreach($packages as $package)
                <tr>
                    <td class="actionOrder">
{{--                        <form class="deleteFormOrders" action="" method="POST">@csrf @method('DELETE')<button class="submitDeleteOrder"><img src="{{asset('images/icons/bin.png')}}" alt=""></button></form>--}}
                        @if($package->status === 'purchased')
                            <a href="{{route('package.share',$package->id)}}"><div class="shareCourseButton">Send Course</div></a>
                            <a href="{{route('course.index',$package->id)}}" class="startCourseButton">Start Course</a>
                        @else
                            <div class="greenMessage">This course has been completed</div>
                            <a href="{{route('course.index',$package->id)}}" class="startCourseButton">View Course</a>
                        @endif
                    </td>
                    <td class="hiddenRows">{{$package->id}}</td>
                    <td>{{$package->course_name}}</td>
                    <td class="hiddenRows">{{$package->status}}</td>
                    @if($package->certificate_id)
                    <td><a href="{{route('certificate.download', $package->certificate_id)}}"><img class="invoiceLink" src="{{asset('images/icons/pdf.png')}}" alt=""></a></td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
            @endforeach
            {{--        <tr class="active-row">--}}
            {{--            <td>Melissa</td>--}}
            {{--            <td>5150</td>--}}
            {{--        </tr>--}}
            {{--        <!-- and so on... -->--}}
            </tbody>
        </table>

            {{ $packages->links('paginator.paginator') }}

        @else
            <div class="textAdmin">No Packages at the moment</div>
        @endif
    </div>
    <script src="{{asset('js/adminPage.js')}}"></script>
@endsection
