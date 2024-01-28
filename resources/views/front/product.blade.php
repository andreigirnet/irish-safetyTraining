@extends('front.app')
@section('content')
    <div class="title" data-aos="fade-up">
        <div class="titleText">{{$product->name}}</div>
        <div class="borderTitle"></div>
    </div>

    <div class="productSection">
        <div class="productInner">
            <div class="productIcons">
                <div class="productItemIcon">
                <img src="{{asset('images/productIcons/clock.png')}}" alt="" data-aos="fade-right">
                    <div class="productItemText" data-aos="fade-left">Average Duration: {{$product->durationTraining}} Hour</div>
                </div>
                <div class="productItemIcon">
                    <img src="{{asset('images/productIcons/printer.png')}}" alt="" data-aos="fade-right">
                    <div class="productItemText" data-aos="fade-left">Digital & Printable Certificate</div>
                </div>
                <div class="productItemIcon">
                    <img src="{{asset('images/productIcons/mortarboard.png')}}" alt="" data-aos="fade-right">
                    <div class="productItemText" data-aos="fade-left">Unlimited Exam Attempts</div>
                </div>
                <div class="productItemIcon">
                    <img src="{{asset('images/productIcons/map.png')}}" alt="" data-aos="fade-right">
                    <div class="productItemText" data-aos="fade-left">Accepted Across Ireland, UK and Europe</div>
                </div>
                <div class="productItemIcon">
                    <img src="{{asset('images/productIcons/validation.png')}}" alt="" data-aos="fade-right">
                    <div class="productItemText" data-aos="fade-left">Valid For {{$product->certificateValidity}} Years</div>
                </div>
                <div class="productItemIcon">
                    <img src="{{asset('images/productIcons/calendar.png')}}" alt="" data-aos="fade-right">
                    <div class="productItemText" data-aos="fade-left">Self-Paced. Available 24/7</div>
                </div>
                <div class="productItemIcon">
                    <img src="{{asset('images/productIcons/smartphone.png')}}" alt="" data-aos="fade-right">
                    <div class="productItemText" data-aos="fade-left">Available On All Major Devices</div>
                </div>
                <div class="productItemIcon">
                    <img src="{{asset('images/productIcons/messenger.png')}}" alt="" data-aos="fade-right">
                    <div class="productItemText" data-aos="fade-left">Live Student Support</div>
                </div>
                <div class="productItemIcon">
                    <img src="{{asset('images/productIcons/document.png')}}" alt="" data-aos="fade-right">
                    <div class="productItemText" data-aos="fade-left">Permanent Record Of Training</div>
                </div>
                <div class="productItemIcon">
                    <img src="{{asset('images/productIcons/user.png')}}" alt="" data-aos="fade-right">
                    <div class="productItemText" data-aos="fade-left">User Management Tools Available</div>
                </div>
            </div>

            <hr>

{{--            <div class="productTitle" data-aos="fade-right">Online {{$product->name}} Training Course</div>--}}
{{--            <div class="productDescription" data-aos="fade-right">This Manual Handling Training Course helps employers ensure that they and their employees are sufficiently trained in the principles and practices of safe manual handling.<br>--}}

{{--                This course provides the necessary information and training for organisations to understand more about the risks associated with manual handling, how to undergo a risk assessment and how to ensure appropriate control measures are put in place.<br>--}}

{{--                It follows the requirements of the Manual Handling Operations Regulations 1992 (MHOR) and provides a practical guide for managing and carrying out safe and healthy manual handling. The course also features videos, diagrams, and downloadable resources to use in your workplace.<br>--}}
{{--            </div>--}}
{{--            <ul class="productList" data-aos="fade-right">--}}
{{--                <li>Ensures compliance with Irish Health and Safety legislation</li>--}}
{{--                <li>Matches the CIEH Level 2 Syllabus</li>--}}
{{--                <li>Developed by FETAC Level  6 Instructor</li>--}}
{{--                <li>Approximate duration: 1 hour</li>--}}
{{--                <li>On completion, download and print your certificate</li>--}}
{{--            </ul>--}}

{{--            <hr>--}}

{{--            <div class="productTitle" data-aos="fade-right">Course Content</div>--}}
{{--            <div class="productContent"data-aos="fade-right">--}}
{{--                <div class="productContentItem">--}}
{{--                    <div class="productContentId">1</div>--}}
{{--                    <div class="productContentTitle">Manual Handling Injuries</div>--}}
{{--                    <div class="productContentDescription">Types of injury, immediate injuries and musculoskeletal disorders.</div>--}}
{{--                </div>--}}
{{--                <div class="productContentItem">--}}
{{--                    <div class="productContentId">2</div>--}}
{{--                    <div class="productContentTitle">Risk Assessments for Safe Manual Handling</div>--}}
{{--                    <div class="productContentDescription">what is a risk assessment?, who should carry out a risk assessment?, identifying hazards, TILE, factors that increase the risk of harm, deciding who may be harmed and how, occupations most at risk, evaluating risks, recording the significant findings, reviewing and updating, results of your risk assessment.</div>--}}
{{--                </div>--}}
{{--                <div class="productContentItem">--}}
{{--                    <div class="productContentId">3</div>--}}
{{--                    <div class="productContentTitle">Avoiding and Controlling the Risks</div>--}}
{{--                    <div class="productContentDescription">employer duties, avoiding manual handling, reducing the risk, team handling, mechanical and automation precautions, personal protective equipment and TILE.</div>--}}
{{--                </div>--}}
{{--                <div class="productContentItem">--}}
{{--                    <div class="productContentId">4</div>--}}
{{--                    <div class="productContentTitle">Safe Manual Handling Techniques</div>--}}
{{--                    <div class="productContentDescription">lifting and lowering techniques, safe weights for lifting and lowering, carrying, risk assessments and HSE tools, pushing and pulling, and team handling.</div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <hr>--}}

{{--            <div class="productTitle" data-aos="fade-right">Aims of the Manual Handling Training</div>--}}
{{--            <div class="productDescription" data-aos="fade-right">Upon completion of this course, you will:<br>--}}
{{--            </div>--}}
{{--            <ul class="productList" data-aos="fade-right">--}}
{{--                <li>Understand what is meant by manual handling.</li>--}}
{{--                <li>Be able to explain the common causes of injury and potential long-term damages to health as a result of poor manual handling techniques.</li>--}}
{{--                <li>Understand the legal responsibilities and the duties placed upon employers and employees.</li>--}}
{{--                <li>Be able to identify manual handling hazards.</li>--}}
{{--                <li>Understand how to carry out an effective manual handling risk assessment.</li>--}}
{{--                <li>Understand the control measures that can be put in place to reduce the risk of harm.</li>--}}
{{--                <li>Understand and practise the best way to handle loads to maintain a safe working environment.</li>--}}
{{--            </ul>--}}

{{--            <hr>--}}

{{--            <div class="productTitle" data-aos="fade-right">Assessment</div>--}}
{{--            <div class="productDescription" data-aos="fade-right">The online assessment is taken on completion of the training material. You will be asked 10 multiple choice questions with a pass mark of 80%. The answers are marked automatically so that you’ll instantly know whether you passed. If you don't pass don't worry! You can take the test as many times as you need with no extra charge.<br>--}}
{{--            </div>--}}
            {!!$product->description!!}
        </div>
    </div>
@endsection
