@extends('admin.administrator.layout')
@section('adminPages')
    <div class="dashWrapper" >
        <div class="adminHomePageTitle">Edit Packages Paid To Trainer</div>
        <div class="formEdit">
            <form action="{{route('packages.admin.update.from.to')}}" method="POST" class="registerEmployeeForm">
                @csrf
                @method('PUT')
                <input type="number" class="formInputShare" name="from" placeholder="from" id="fromBulk" min="1">
                <input type="number" class="formInputShare" name="to" placeholder="to" id="toBulk" min="1">
                <div style="display: flex; column-gap: 10px">
                    <button type="submit" class="adminButton">Update All</button>
                    <div class="adminButton" style="display: flex; align-items: center; justify-content: center;" id="countPackages">Count packages</div>
                </div>
            </form>
        </div>
        <div id="countResult"></div>
    </div>
@endsection
