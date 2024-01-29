@extends('admin.administrator.layout')
@section('adminPages')
    <div class="homePageAdminContent">
        @if (session('created'))
            <div class="modalRegisterComplete" id="modalRegisterEmployer">
                <div class="modalTitle">Hi there</div>
                <p>Its <a href="{{route('home')}}">www.skillcourses.ie</a> Training Centre here.</p>
                <div class="modalText">
                    <div>
                        If you need any additional information or help pls feel free to contact us anytime through the chat on our website.
                        <br><br>
                        You can take the course by following the steps from our website if you are logged in or come back later anytime through your email that was sent to you right now from our system using your login details ( password & email).Check your spam/junk mail just in case.
                        <br><br>
                        You can choose the language you need for taking your training after the payment it’s processed successfully (English/Polish/Spanish/Russian/Romanian)
                        <br><br>
                        We are assisting our customers from 10am till 7-8pm every single day including weekends.
                    </div>
                </div>
                <div class="modalText">
                    Kind regards
                </div>
                <div class="adminButton" style="display: flex; align-items: center; justify-content: center; margin-top: 20px" id="understoodButton">UNDERSTOOD</div>
            </div>
        @endif
        <div class="adminHomePageTitle">EFFECTIVE AND ACCESIBLE</div>
        <div class="adminHomePageInformation">
            <b class="textColorTitle">{{env('APP_NAME')}}</b>
            is one of Irish leading providers of simple, effective, and accessible occupational health and safety training materials.

            We are focused on providing our wide range of Irish and International clients with excellence in customer service, and regulatory compliance.

            Our easy-to-use online learning platform makes training easy whether for yourself or hundreds of your staff.
        </div>
        @if($userPackageId)
            <div class="notice">
                <div class="noticeTitle">Notice:</div>
                <div class="noticeText">
                    Please Notice : You have received the course / courses, either after your own purchase or from employer.
                    <br>
                    To be able to start training, you need to activate it first by pressing the following link and after that press on the Study button to get started.
                    <br><br>
                    Follow the link bellow
                    <br>
                </div>
                <a class="homeDownloadButton" href="{{route('package.index')}}">Link</a>
            </div>
        @endif
{{--        <div class="homeActionButtons">--}}
{{--            @if($userPackageId)--}}
{{--                <a href="{{route('course.index', $userPackageId[0]->id)}}" class="homeStartCourseButton">Start Course</a>--}}
{{--            @else--}}
{{--                <form action="{{route('basket.add')}}" method="POST">--}}
{{--                    @csrf--}}
{{--                    <input type="hidden" value="1" name="productId">--}}
{{--                    <button type="submit" class="homeStartCourseButton">Buy a course</button>--}}
{{--                </form>--}}
{{--            @endif--}}
{{--            @if($certificateId)--}}
{{--                <a href="{{route('certificate.download', $certificateId[0]->id)}}" class="homeDownloadButton">Downloand Certificate</a>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <div class="productSection">--}}
{{--            <div class="productWrapper">--}}
{{--                <div class="product-img">--}}
{{--                    <img src="{{asset("images/products/productSmall.png")}}" height="420" width="327">--}}
{{--                </div>--}}
{{--                <div class="product-info">--}}
{{--                    <div class="product-text">--}}
{{--                        <h1>Manual Handling</h1>--}}
{{--                        <h2>By {{env("app_name")}}</h2>--}}
{{--                        <div class="product-info-icons">--}}
{{--                            <div class="product-icons">--}}
{{--                                <img src="images/icons/back-in-time.png" alt="">--}}
{{--                                <div>Duration: 2-3 hours</div>--}}
{{--                            </div>--}}
{{--                            <div class="product-icons">--}}
{{--                                <img src="images/icons/certificate.png" alt="">--}}
{{--                                <div>Certificate Validity: 3 Years</div>--}}
{{--                            </div>--}}
{{--                            <div class="product-icons">--}}
{{--                                <img src="images/icons/money.png" alt="">--}}
{{--                                <div style="font-weight: bold">Only 30€</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="product-price-btn">--}}
{{--                        <a href="{{route('front.product',1)}}"><button type="button" class="buttonInfo" style="background: white;   border: 1px solid var(--yellowColor);color: black;">info</button></a>--}}
{{--                        <form action="{{route('basket.add')}}" method="POST">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" value="1" name="productId">--}}
{{--                            <button type="submit">Add To Basket</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--            <div class="langTitle">--}}
{{--                <div class="languageText">Our Course is available in 5 languages:</div>--}}
{{--                <div class="languagesSection">--}}
{{--                    <img src="{{asset('images/flags/en.png')}}" alt="">--}}
{{--                    <img src="{{asset('images/flags/pl.png')}}" alt="">--}}
{{--                    <img src="{{asset('images/flags/ro.png')}}" alt="">--}}
{{--                    <img src="{{asset('images/flags/ru.png')}}" alt="">--}}
{{--                    <img src="{{asset('images/flags/sp.png')}}" alt="">--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="adminProducts">
                @foreach($products as $product)
                    <div class="adminProduct">
                        <img src="{{asset('images/productAdd/'.$product->image)}}" alt="" class="adminProductImage">
                        <div class="adminProductBottom">
                            <div class="adminProductName">{{$product->name}}</div>
                            <div style="color: #397b21; font-weight: bold">e-Learning Course</div>
                            <hr>
                            <div class="product-info-icons">
                                <div class="product-icons">
                                    <img src="images/icons/back-in-time.png" alt="">
                                    <div>Duration: {{$product->durationTraining}} hours</div>
                                </div>
                                <div class="product-icons">
                                    <img src="images/icons/certificate.png" alt="">
                                    <div>Certificate Validity: {{$product->certificateValidity}} Years</div>
                                </div>
                                <div class="product-icons">
                                    <img src="images/icons/money.png" alt="">
                                    <div style="font-weight: bold">Only {{$product->price}} €</div>
                                </div>
                            </div>
                            @if(!$product->status)
                            <form action="{{route('basket.add')}}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$product->id}}" name="productId">
                                <div class="productButtons">
                                <button type="submit" class="buttonProductAdminAdd">Add To Basket</button>
                                    @if($product->description)
                                    <a href="{{route('front.product', $product->id)}}" class="homeStartCourseButton">Info</a>
                                    @endif
                                </div>
                            </form>
                            @else
                                <div class="productButtons">
                                    <button type="submit" class="buttonProductAdminAdd">Coming Soon</button>
                                    @if($product->description)
                                    <a href="{{route('front.product', $product->id)}}" class="homeStartCourseButton">Info</a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
    <script src="{{asset('js/showModalRegisterEmployee.js')}}"></script>
@endsection
