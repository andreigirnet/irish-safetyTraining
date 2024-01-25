@extends('front.app')
@section('content')
    <div class="secondaryBannerContact">
        <div class="secondaryBannerTeamLayer"></div>
        <div class="secondaryBannerTitle" x-html="data.contact">Contact Us</div>
    </div>
    <div class="trainTeamsSection">
        <div class="trainTeamsWrapper">
            <div class="teamTitle" x-html="data.contactTap">Call us on - 0892777333</div>
            <div class="teamDescription" x-html="data.contactText">Our working hours are: 10am-7pm Monday - Friday & 10am - 6pm <br> Weekend/Bank Holiday or email us to info@skillcourses.ie</div>
        </div>
    </div>
@endsection
