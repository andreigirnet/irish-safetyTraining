@extends('front.app')
@section('content')
    <div class="secondaryBannerContact">
        <div class="secondaryBannerTeamLayer"></div>
        <div class="secondaryBannerTitle" x-text="team.teamTitle">Train teams effectively and efficiently</div>
    </div>
    <div class="trainTeamsSection">
        <div class="trainTeamsWrapper">
            {{--            <div class="teamTitle">Train teams effectively and efficiently</div>--}}
            <div class="teamDescription" x-text="team.teamDescription">At Irish Manual Handling, we take pride in being available to assist you with a variety of training needs across multiple subjects. Our e-learning courses are entirely online, allowing you to conveniently access the training required by you and your company. Whether in your free time or during work hours, our courses are accessible at any time of the day.</div>
        </div>
    </div>
    <div class="trainingContainer">
        <div class="trainingRightSide">
            <div class="trainingLeftDescription">
                <div class="trainingTitle" x-text="team.bulkDiscount[0]">Bulk Discounts</div>
                <div class="trainingDescription" x-html="team.bulkDiscount[1]">
                    The more you order, the greater the discount. Our bulk discounts apply to orders featuring a mix of courses. These courses have no time limit for completion, allowing you to maximize your training opportunities.

                    -10% discount for orders of 10+ courses

                    For larger enterprise orders exceeding 500 courses, we handle them on an individual basis. This involves creating a tailored package to meet your specific needs, including the following benefits:

                    A dedicated Account Manager
                    Course reset options if an employee leaves your company
                    Customized reports and progress tracking within your personal Management Suite
                    For a more detailed discussion about your training requirements and budget, please reach out to our friendly sales team via WhatsApp at +353894631967.
                </div>
            </div>
            <div class="trainingRightIcon">
                <img src="{{asset('images/training/tr-img-1.png')}}" alt="">
            </div>
        </div>

        <div class="trainingLeftSide">
            <div class="trainingLeftIcon">
                <img src="{{asset('images/training/tr-img-2.png')}}" alt="">
            </div>
            <div class="trainingRightDescription">
                <div class="trainingTitle" x-text="team.invoice[0]">Can I pay by invoice?</div>
                <div class="trainingDescription" x-html="team.invoice[1]">
                    Yes, you can! By opting for an invoice payment, you'll benefit from:

                    30-day payment terms for invoices
                    Adding a company PO number if needed
                    Access to training prior to invoice settlement*
                    For lower quantities requiring invoicing, feel free to reach out directly, and we'll gladly assist. *Training certificates will be provided upon invoice payment.
                </div>
            </div>
        </div>

        <div class="trainingRightSide">
            <div class="trainingLeftDescription">
                <div class="trainingTitle" x-text="team.urgent[0]">Urgent training requirements? No problem...</div>
                <div class="trainingDescription" x-html="team.urgent[1]">
                    Absolutely! From our self-service checkout system to instant online certification, we're here to expedite your team's training needs.
                    Identifying skill gaps in your organization means every passing moment is either a missed opportunity or a quality risk.
                    With our system, your team can start learning within minutes.
                    Delivery of compliance training takes hours, not days. We can simultaneously train large numbers of users without logistical issues.
                </div>
            </div>
            <div class="trainingRightIcon">
                <img src="{{asset('images/training/tr-img-3.png')}}" alt="">
            </div>
        </div>

        <div class="trainingLeftSide">
            <div class="trainingLeftIcon">
                <img src="{{asset('images/training/tr-img-4.png')}}" alt="">
            </div>
            <div class="trainingRightDescription">
                <div class="trainingTitle" x-text="team.minim[0]">Minimise disruption - train online</div>
                <div class="trainingDescription" x-html="team.minim[1]">
                    Conventional training involves halting work for all your staff to convene in one location. We advocate for a more efficient approach...
                    Online training liberates you from the expenses and interruptions caused by assembling everyone in a single place for learning purposes.
                    Accessible round the clock, 365 days a year, online training automatically saves your progress. Staff can train from anywhere, including while commuting.
                </div>
            </div>
        </div>

    </div>

@endsection
