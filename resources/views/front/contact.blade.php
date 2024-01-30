@extends('front.app')
@section('content')
    <div class="secondaryBannerContact">
        <div class="secondaryBannerTeamLayer"></div>
        <div class="secondaryBannerTitle" x-html="data.contact">Contact Us</div>
    </div>
    <div class="trainTeamsSection">
        <div class="trainTeamsWrapper">
            <div class="teamTitle" x-html="data.contactTap">Call us on - 0830800800</div>
            <div class="teamDescription" x-html="data.contactText">Our working hours are: 9am till 9-10pm daily including weekends si Address : ACE Enterprise Park, Bawnogue Rd, Clondalkin, Co. Dublin, D22 TX92 <br> email us to info@skillcourses.ie</div>
        </div>
    </div>
@endsection
