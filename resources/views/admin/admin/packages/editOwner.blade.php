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
                axios.get('/search?q=' + this.query)
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
        <div class="adminHomePageTitle">Edit Package</div>
        <div class="formEdit">
            <form action="{{route('packages.admin.updateOwner', $package->id)}}" method="POST" class="registerEmployeeForm" id="registerEmployeeForm">
                @csrf
                @method('PUT')
                <label class="formLabel" for="owner">Employees: Change Owner</label>
                <input type="text" class="formInputShare" x-model="query" x-on:keyup.debounce.500ms="getUsers" placeholder="Type the email of the user">
                <select x-show="showResult" name="user_id" id="owner" style="height: 200px" @change="checkIfSelected" multiple>
                    <template x-for="user in users">
                        <option  x-text="user.email" :value="user.id" class="textShare"></option>
                    </template>
                </select>
                <div class="shareMesage" x-text="message" x-show="showMessage"></div>
                <button type="submit" class="adminButton" x-show="showSubmitButton">Update</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('registerEmployeeForm').addEventListener('keydown', function(event) {
            if (event.keyCode === 13) {
                event.preventDefault(); // prevent the "enter" key event
            }
        });
    </script>
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
