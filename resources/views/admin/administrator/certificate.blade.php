@extends('admin.administrator.layout')
@section('adminPages')
    <div class="dashWrapper">
        <div class="adminHomePageTitle">Certificates</div>
        @if(count($certificates))
        <table class="styled-table">
            <thead>
            <tr>
                <th>Certificate Id</th>
                <th>Course Passed</th>
                <th class="hiddenRows">Valid From</th>
                <th class="hiddenRows">Valid To</th>
                <th>Downloand</th>
            </tr>
            </thead>
            <tbody>
            @foreach($certificates as $certificate)
                <tr>
{{--                    <td class="actionOrder">--}}
{{--                        <form class="deleteFormOrders" action="{{route('order.delete', $order->id)}}" method="POST">@csrf @method('DELETE')<button class="submitDeleteOrder"><img src="{{asset('images/icons/bin.png')}}" alt=""></button></form>--}}
{{--                    </td>--}}
                    <td>{{$certificate->unique_id}}</td>
                    <td>{{$certificate->course_name}}</td>
                    <td class="hiddenRows">{{$certificate->valid_from}}</td>
                    <td class="hiddenRows">{{$certificate->expiration_date}}</td>
                    <td><a href="{{route('certificate.download', $certificate->certificateId)}}"><img class="invoiceLink" src="{{asset('images/icons/pdf.png')}}" alt=""></a></td>
                </tr>
            @endforeach
            {{--        <tr class="active-row">--}}
            {{--            <td>Melissa</td>--}}
            {{--            <td>5150</td>--}}
            {{--        </tr>--}}
            {{--        <!-- and so on... -->--}}
            </tbody>
        </table>

            {{ $certificates->links('paginator.paginator') }}
        @else
            <div class="textAdmin">No certificates at the moment</div>
        @endif
    </div>
@endsection
