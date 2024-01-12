@extends('front.app')
@section('content')
    <div class="title" data-aos="fade-up">
        <div class="titleText" x-text="consult.title">Consulting Services for Safety</div>
        <div class="borderTitle"></div>
    </div>

    <div class="consultingWrap" data-aos="fade-up">
        <div class="consultingContainer">
            <h1 class="consultingTitle" x-text="consult.services">Our Services:</h1>
{{--            <br><br>--}}
{{--            <div class="consultingListText" x-text="consult.line1">--}}
{{--                Our extensive experience positions us as leaders in staying updated with the latest corporate safety standards aimed at accident prevention.--}}
{{--            </div>--}}
{{--            <br>--}}
{{--            <div class="consultingListText">--}}
{{--                <h4 x-text="consult.dublin">Safety Consultancy Services in Dublin </h4>--}}
{{--                <div x-text="consult.line3">We conduct Health & Safety Consultancy across Dublin, utilizing field experts to deliver training and guidance across various company profiles.</div>--}}
{{--            </div>--}}
{{--            <br>--}}
{{--            <div class="consultingListText" x-text="consult.line4">--}}
{{--                Furthermore, we specialize in investigating accidents and their root causes, implementing necessary preventive measures to avoid recurrence within the workplace.--}}
{{--            </div>--}}

            <div class="consultingList">
                <div class="consultingListItem">
                    <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                    <div class="consultingListText" x-text="consult.list[0]">Safe-T-Cert management systems</div>
                </div>
                <div class="consultingListItem">
                    <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                    <div class="consultingListText" x-text="consult.list[1]">Workplace inspections</div>
                </div>
                <div class="consultingListItem">
                    <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                    <div class="consultingListText" x-text="consult.list[2]">Comprehensive safety audits</div>
                </div>
                <div class="consultingListItem">
                    <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                    <div class="consultingListText" x-text="consult.list[3]">Setting up cloud safety file documentation</div>
                </div>
                <div class="consultingListItem">
                    <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                    <div class="consultingListText" x-text="consult.list[4]">Creating health and safety policies</div>
                </div>
                <div class="consultingListItem">
                    <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                    <div class="consultingListText" x-text="consult.list[5]">Conducting risk, noise, and COSHH assessments</div>
                </div>
                <div class="consultingListItem">
                    <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                    <div class="consultingListText" x-text="consult.list[6]">Developing company safety statements</div>
                </div>
                <div class="consultingListItem">
                    <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                    <div class="consultingListText" x-text="consult.list[7]">Crafting health and safety plans</div>
                </div>
                <div class="consultingListItem">
                    <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                    <div class="consultingListText" x-text="consult.list[8]">Creating method statements</div>
                </div>
                <div class="consultingListItem">
                    <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                    <div class="consultingListText" x-text="consult.list[9]">Performing risk assessments</div>
                </div>
                <div class="consultingListItem">
                    <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                    <div class="consultingListText" x-text="consult.list[10]">Investigating accident incidents</div>
                </div>
                <div class="consultingListItem">
                    <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                    <div class="consultingListText" x-text="consult.list[11]">Assessing training requirements and providing seminars, toolbox talks, and training courses</div>
                </div>
                <div class="consultingListItem">
                    <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                    <div class="consultingListText" x-text="consult.list[12]">PAT testing</div>
                </div>
            </div>
            <hr style="margin-top: 50px">
            <br>
            <br>

            <div class="consultingListText" x-text="consult.line5">
                We collaborate with you to identify your goals and leverage our expertise to foster a culture of workplace health and safety.
            </div>

            <h1 class="consultingTitle" style="margin-top: 50px" x-text="consult.services">Our Services:</h1>
            <div class="consultingListText" x-text="consult.line6">
                We offer assistance to employers seeking third-party support to meet their workplace health and safety goals, whether on an ongoing basis or for specific projects.
            </div>
            <br>
            <div class="consultingListText"  x-text="consult.line7">
                Through our collaborative discovery process, we identify your unique objectives and needs, establishing key benchmarks to align our efforts with your definition of success.
            </div>
            <br>
            <div class="consultingListText"  x-text="consult.line8">
                At Irish Manual Handling we partner with organizations to continuously implement health and safety programs. This involves conducting audits and inspections, developing policies and procedures tailored to specific hazards, and offering outsourced health and safety management as necessary.
            </div>
            <br>
            <div class="consultingListText"  x-text="consult.line9">
                For inquiries about our Advisory services or clarifications regarding compliance with workplace regulations and legislation, feel free to schedule a consultation with our team directly at +353894631967.
            </div>
        </div>
    </div>
@endsection
