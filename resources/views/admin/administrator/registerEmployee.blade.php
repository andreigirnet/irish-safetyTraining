@extends('admin.administrator.layout')
@section('adminPages')
    <div class="registerEmployeeWrapper">
        @if (session('registered'))
            <div class="modalRegisterComplete" id="modalRegisterEmployer">
                <div class="modalTitle">You have registered successfully your employee.</div>
                <div class="modalText">
                    <p>Please inform that the login details were emailed to him/her that can be used anytime later to access our website and take the course.
                    <br><br>
                    It's important to check the spam and junk mail just in case. If you wish to send the course to your employee please press the link below (<a
                            href="https://www.skillcourses.ie/packages">https://www.skillcourses.ie/packages</a>).
                    <br><br>
                    You must have the course/courses purchased to be able to take this step, otherwise go to the home page and pay for the course / amount of courses you need and after that send it to your employees.
                    </p>
                </div>
                <div class="adminButton" style="display: flex; align-items: center; justify-content: center; margin-top: 20px" id="understoodButton">UNDERSTOOD</div>
            </div>
        @endif
        <div class="leftRegisterEmployee">
            <div class="stepsCircle">
                <div class="stepsContainer">
                    <div class="stepsCircleTitle">STEP 1- Register The Employee</div>
                    <div class="circle-progress first-circle" data-aos="fade-right">
                        <div class="circle-nr">1</div>
                        <svg viewBox="0 0 36 36" class="circular-chart orange">
                            <path class="circle-bg"
                                  d="M18 2.0845
                                         a 15.9155 15.9155 0 0 1 0 31.831
                                         a 15.9155 15.9155 0 0 1 0 -31.831"
                            />
                            <path class="circle"
                                  stroke-dasharray="25, 100"
                                  d="M18 2.0845
                                         a 15.9155 15.9155 0 0 1 0 31.831
                                         a 15.9155 15.9155 0 0 1 0 -31.831"
                            />

                        </svg>
                    </div>
                </div>
            </div>

            <div class="stepsCircle">
                <div class="stepsContainer">
                    <div class="stepsCircleTitle">STEP 2- Check Your Dashboard</div>
                    <div class="circle-progress first-circle" data-aos="fade-right">
                        <div class="circle-nr">2</div>
                        <svg viewBox="0 0 36 36" class="circular-chart orange">
                            <path class="circle-bg"
                                  d="M18 2.0845
                                         a 15.9155 15.9155 0 0 1 0 31.831
                                         a 15.9155 15.9155 0 0 1 0 -31.831"
                            />
                            <path class="circle"
                                  stroke-dasharray="75, 100"
                                  d="M18 2.0845
                                         a 15.9155 15.9155 0 0 1 0 31.831
                                         a 15.9155 15.9155 0 0 1 0 -31.831"
                            />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="stepsCircle">
                <div class="stepsContainer">
                    <div class="stepsCircleTitle">STEP 3- Send Him The Course Link</div>
                    <div class="circle-progress first-circle" data-aos="fade-right">
                        <div class="circle-nr">3</div>
                        <svg viewBox="0 0 36 36" class="circular-chart orange">
                            <path class="circle-bg"
                                  d="M18 2.0845
                                         a 15.9155 15.9155 0 0 1 0 31.831
                                         a 15.9155 15.9155 0 0 1 0 -31.831"
                            />
                            <path class="circle"
                                  stroke-dasharray="100, 100"
                                  d="M18 2.0845
                                         a 15.9155 15.9155 0 0 1 0 31.831
                                         a 15.9155 15.9155 0 0 1 0 -31.831"
                            />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="rightRegisterEmployee">
            <div class="adminHomePageTitle">Register Your Employees</div>
            <div class="adminHomePageDescription">Register Your Employees by adding their details in the form</div>
            <form action="{{route('register.employee.store')}}" method="POST" class="registerEmployeeForm">
                @csrf
                <label for="userNameEmployee" class="formLabel">Employee Full Name</label>
                <input type="text" id="userNameEmployee" name="name" class="formInputProfile">

                <label for="userEmailEmployee" class="formLabel">Employee Email</label>
                <input type="email" id="userEmailEmployee" name="email" class="formInputProfile">

                <label for="userEmailPhone" class="formLabel">Employee Phone Number</label>
                <input type="text" id="userEmailPhone" name="phone" class="formInputProfile">

                <button type="submit" class="adminButton" id="showModalRegister">Add</button>
            </form>
            <div id="errorDiv">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>*{{$error}}</div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <script src="{{asset('js/showModalRegisterEmployee.js')}}"></script>
@endsection
