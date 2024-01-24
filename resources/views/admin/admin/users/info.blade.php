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
                axios.get('/search/all/employees?q=' + this.query)
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
        <div class="adminHomePageTitle">Info</div>
        <div class="landscape">
            <img src="{{asset('images/banners/landscape.png')}}" alt="">
            <div class="landscapeText">Please rotate your phone</div>
        </div>
        <div class="titleText hide" style="font-size: 23px">Packages Owned By: {{$user->email}}</div>
        <div href="" class="addEmployee hide" id="addPackage">Add package</div>
        <form action="{{route('packages.admin.add')}}" method="POST" id="adminCreatePackage" class="registerEmployeeForm hide">
            @csrf
            <input type="hidden" id="userNameEmployee" name="userId" value="{{$user->id}}">
            <label for="course" class="formLabel">Course Name</label>
            <select name="course" id="course" style="height: 40px" required>
                @foreach($products as $product)
                <option value="{{$product->id}}" >{{$product->name}}</option>
                @endforeach
            </select>
            <label for="userEmailEmployee" class="formLabel">Quantity</label>
            <input type="number" id="userEmailEmployee" name="quantity" class="formInputProfile" placeholder="Type the quantity" required>
            <button type="submit" class="adminButton">Add</button>
        </form>
        <table class="styled-table hide">
            <thead>
            <tr>
                <th>Action Id</th>
                <th>Package Id</th>
                <th class="hiddenRows">Purchase Date</th>
                <th>Course Name</th>
                <th>Status</th>
                <th>Certificate</th>
                <th class="hiddenRows">Expiration Date</th>
                <th>Generate Certificate</th>
            </tr>
            </thead>
            <tbody>
            @if($packages)
            @foreach($packages as $package)
                <tr>
                    <td class="actionRow">
                        <form action="{{route('packages.admin.delete', $package->package_id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="removeButton">
                                <img src="{{asset('images/icons/bin.png')}}" alt="">
                            </button>
                        </form>
                        @if($package->certificate_id === null)
                        <a href="{{route('packages.admin.edit', $package->package_id)}}" class="editLink"><img src="{{asset('images/icons/edit.png')}}" alt=""></a>
                        <a href="{{route('packages.admin.owner', $package->package_id)}}" class="editLink"><img src="{{asset('images/icons/star.png')}}" alt=""></a>
                        @endif
                    </td>
                    <td>{{$package->package_id}}</td>
                    <td class="hiddenRows">{{$package->created_at}}</td>
                    <td>{{$package->course_name}}</td>
                    <td>{{$package->status}}</td>
                    @if($package->certificate_id !== null)
                    <td><a href="{{route('certificate.download', $package->certificate_id)}}"><img class="invoiceLink" src="{{asset('images/icons/pdf.png')}}" alt=""></a></td>
                    @else
                    <td>No certificate</td>
                    @endif
                    @if($package->certificate_id !== null)
                    <td class="hiddenRows">{{$package->expiration_date}}</td>
                    @else
                        <td class="hiddenRows">No certificate</td>
                    @endif

                        @if($package->status === 'practice' && $package->certificate_id === null)
                        <td>
                            <form action="{{route('certificate.store', $package->package_id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="userId" value="{{$user->id}}">
                                <button type="submit" class="downCertificate">Generate Certificate</button>
                            </form>
                        </td>
                        @elseif($package->certificate_id !== null)
                            <td>Certificate generated</td>
                        @else
                            <td>Course not completed</td>
                        @endif
                </tr>
            @endforeach
            @else
                <td>No packages owned by this user</td>
            @endif
            {{--        <tr class="active-row">--}}
            {{--            <td>Melissa</td>--}}
            {{--            <td>5150</td>--}}
            {{--        </tr>--}}
            {{--        <!-- and so on... -->--}}
            </tbody>
        </table>

        <div class="titleText hide" style="font-size: 23px">Employees Owned By: {{$user->email}}</div>
        <div class="addEmployeeContainer">
            <button class="addEmployee hide" id="addEmployee">Add New employee</button>
            <button class="addEmployeeEx hide" id="existsButton">Add Existing employee</button>
        </div>
        <form action="{{route('user.admin.exist')}}" method="POST" class="formShare" id="existsForm">
            @csrf
            @method('POST')
            <input type="hidden" name="companyId" value="{{$user->id}}">
            <input type="text" class="formInputShare" x-model="query" x-on:keyup.debounce.500ms="getUsers" placeholder="Type the email of the user">
            <select x-show="showResult" name="employeeId" id="shareTo" @change="checkIfSelected" style="height: 200px;width: 100%" x-model="selectedEmployee" multiple>
                <template x-for="user in users" >
                    <option  x-text="user.email" :value="user.id" class="textShare"></option>
                </template>
            </select>
            <div class="shareMesage" x-text="message" x-show="showMessage"></div>
            <button class="adminButton" type="submit" x-show="showSubmitButton">Add</button>
        </form>
        <form action="{{route('register.employee.store')}}" method="POST" id="adminRegisterEmployee" class="registerEmployeeForm hide">
            @csrf
            <label for="userNameEmployee" class="formLabel">Employee Full Name</label>
            <input type="text" id="userNameEmployee" name="name" class="formInputProfile">

            <label for="userEmailEmployee" class="formLabel">Employee Email</label>
            <input type="email" id="userEmailEmployee" name="email" class="formInputProfile">

            <label for="userEmailPhone" class="formLabel">Employee Phone Number</label>
            <input type="text" id="userEmailPhone" name="phone" class="formInputProfile">

            <button type="submit" class="adminButton">Add</button>
        </form>
        <table class="styled-table hide">
            <thead>
            <tr>
                <th>Action Id</th>
                <th>Employee ID</th>
                <th>Created At</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            @if($employees)
            @foreach($employees as $employee)
                <tr>
                    <td class="actionRow">
                        <form action="{{route('delete.employer', $employee->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="removeButton">
                                <img src="{{asset('images/icons/bin.png')}}" alt="">
                            </button>
                        </form>
                    </td>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->created_at}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                </tr>
            @endforeach
            @else
                <td>No employees owned by this user</td>
            @endif
            {{--        <tr class="active-row">--}}
            {{--            <td>Melissa</td>--}}
            {{--            <td>5150</td>--}}
            {{--        </tr>--}}
            {{--        <!-- and so on... -->--}}
            </tbody>
        </table>
    </div>
    <script>
        let addEmployee = document.getElementById('addEmployee');
        const form = document.getElementById('adminRegisterEmployee');
        let showRegisterEmployee = false;
        addEmployee.addEventListener('click', function (){
            showRegisterEmployee = !showRegisterEmployee;
            if(showRegisterEmployee === true){
                form.style.display = 'flex';
                addEmployeeExists.disabled = true
            }else{
                form.style.display = 'none';
                addEmployeeExists.disabled = false
            }
        })

        let addPackage = document.getElementById('addPackage');
        const formPackage = document.getElementById('adminCreatePackage');
        let showAddPackage = false;
        addPackage.addEventListener('click', function (){
            showAddPackage = !showAddPackage;
            if(showAddPackage === true){
                formPackage.style.display = 'flex';
            }else{
                formPackage.style.display = 'none';
            }
        })

        let addEmployeeExists = document.getElementById('existsButton');
        const formExists = document.getElementById('existsForm');
        let showExists = false;
        addEmployeeExists.addEventListener('click', function (){
            console.log('click')
            showExists = !showExists;
            if(showExists === true){
                formExists.style.display = 'flex';
                addEmployee.disabled = true;
            }else{
                formExists.style.display = 'none';
                addEmployee.disabled = false;
            }
        })

    </script>
@endsection
