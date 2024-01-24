@extends('admin.administrator.layout')
@section('adminPages')
    <div class="dashWrapper" x-data="{query:'',
        showResult: false,
        users: [],
        getUsers: function(){
            axios.get('/search?q=' + this.query)
            .then(response => {
            this.users = response.data
            this.showResult = true
            })
            .catch(error => console.log(error));
        }
    }">
        <div class="adminHomePageTitle">Edit Package</div>
        <div class="formEdit">
            <form action="{{route('packages.trainer.update', $package->id)}}" method="POST" class="registerEmployeeForm">
                @csrf
                @method('PUT')
                <label class="formLabel" for="course_name">Course Name</label>
                <input class="formInputProfile" type="text" id="course_name" name="course_name" value="{{$package->course_name}}">
                <label class="formLabel" for="status">Statuts: Change</label>
                <select name="status" id="status" style="height: 40px">
                        <option value="purchased">purchased</option>
                        <option value="theory">theory</option>
                        <option value="practice">practice</option>
                </select>
                <input type="hidden" value="{{$package->user_id}}" name="user_id">
                <button type="submit" class="adminButton">Update</button>
            </form>

        </div>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
