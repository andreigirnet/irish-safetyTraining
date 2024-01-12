@extends('admin.administrator.layout')
@section('adminPages')
    <div class="dashWrapper">
        <div class="adminHomePageTitle">Employer Dashboard</div>
        @if($employees)
            <table class="styled-table">
                <thead>
                <tr>
                    <th class="hiddenRows">Action</th>
                    <th class="hiddenRows">Employee Date Of Registration</th>
                    <th>Employee Name</th>
                    <th>Employee email</th>
                    <th>Assigned Course</th>
                    <th>Certificate</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td class="hiddenRows">
                            <form action="{{route('delete.employer', $employee->id)}}" method="POST"> @csrf @method('DELETE')<button class="submitDeleteOrder"><img class="deleteFormOrders" src="{{asset('images/icons/bin.png')}}" alt=""></button></form>

{{--                                <a href="{{route('employer.info', $employee->employee)}}" class="editLink"><img src="{{asset('images/icons/info.png')}}" alt=""></a>--}}
                        </td>
                        <td class="hiddenRows">{{$employee->created_at}}</td>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->email}}</td>
                        @if($employee->assigned)
                            <td><img class="invoiceLink" src="{{asset('images/icons/assign.png')}}" alt=""></td>
                        @else
                            <td>-</td>
                        @endif
                        @if($employee->certificate_id)
                            <td><a href="{{route('certificate.download', $employee->certificate_id)}}"><img class="invoiceLink" src="{{asset('images/icons/pdf.png')}}" alt=""></a></td>
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
        @else
            <div class="shareError">
                <div class="textAdmin">Please register some employees in order to be able to share a course</div>
                <a href="{{route('register.employee')}}"><div class="buttonLink">Register employees</div></a>
            </div>
        @endif
    </div>
@endsection
