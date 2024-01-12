@extends('admin.administrator.layout')
@section('adminPages')
    <div class="dashWrapper" x-data="{
        query:'',
        showResult: false,
        showMessage: false,
        selectedEmployee:'',
        message: '',
        showSubmitButton: false,
        users: [],
        checkIfSelected: function(){
            this.showSubmitButton = true
        },
        getUsers: function(){
            if(this.query !== ''){
                axios.get('/search/employees?q=' + this.query)
                .then(response => {
                    this.users = response.data

                    if(this.users.length === 0){
                        this.showResult = false
                        this.showSubmitButton = false
                        this.showMessage = true
                        this.message = 'No employee has been found with this email'
                    }else
                    {
                        this.showResult = true;
                        this.showMessage = false
                        this.message = ''
                    }
                })
                .catch(error => console.log(error));
            }else{
                this.users = [];
                this.showResult = false;
                this.showSubmitButton = false;
                this.showMessage = false
                this.message = ''
            }
        }
    }">
        <div class="adminHomePageTitle">Share a package</div>
        <div class="shareContainer">
            <div class="textShare">Package to Share:
                <div>#{{$packageToShare[0]->id}}-{{$packageToShare[0]->course_name}}</div>
            </div>
            @if($employeesToShare)
            <div class="selectContainer">
                <div class="selectTitle">Type the email to search the employee</div>
                <form action="{{route('package.share.store',$packageToShare[0]->id)}}" method="POST" class="formShare" id="formShare">
                    @csrf
                    @method('POST')
                    <input type="text" class="formInputShare" x-model="query" x-on:keyup.debounce.500ms="getUsers" placeholder="Type the email of the user">
                    <select x-show="showResult" name="shareToEmployee" id="shareTo" @change="checkIfSelected" style="height: 200px;width: 100%" x-model="selectedEmployee" multiple>
                        <template x-for="user in users" >
                            <option  x-text="user.email" :value="user.id" class="textShare"></option>
                        </template>
                    </select>
                    <div class="shareMesage" x-text="message" x-show="showMessage"></div>
                    <button class="adminButton" type="submit" x-show="showSubmitButton" id="shareSubmit">Share</button>
                </form>
            </div>
            @else
             <div class="shareError">
                 <div class="textAdmin">Please register some employees in order to be able to share a course</div>
                 <a href="{{route('register.employee')}}"><div class="buttonLink">Register employees</div></a>
             </div>
            @endif
        </div>
    </div>

    <script>
        document.getElementById('formShare').addEventListener('keydown', function(event) {
            if (event.keyCode === 13) {
                event.preventDefault(); // prevent the "enter" key event
            }
        });
    </script>
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
