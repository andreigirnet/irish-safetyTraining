@extends('front.app')
@section('content')
    <div class="secondaryBannerFaq">
        {{--        <div class="secondaryBannerTitle">Train teams effectively and efficiently</div>--}}
    </div>
    <div class="title">
        <div class="titleText"  x-text="faq.pageTitle">How can we assist you?</div>
        <div class="borderTitle"></div>
    </div>

    <div class="faqWrapper">
        <div class="faqContainer">
            <div class="faqBox">
                <div class="faqHeader">
                    <img src="{{asset("images/icons/info.png")}}" alt="">
                    <div class="faqTitle" x-text="faq.manualFaq[0]">Manual Handling FAQ's</div>
                </div>
                <div class="innerFaq">
                    <div class="actionAccordion">
                        <div class="accordionButton"  x-text="faq.manualFaq[1]">Key FAQs</div>
                        <div id="uppDownArrow">
                            <svg class="svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="majorFaq">
                            <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                            <div class="majorFaqText"  x-text="faq.manualFaq[2]">Upon completion of your course, you can immediately download your course certificate.</div>
                        </div>
                        <div class="majorFaq">
                            <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                            <div class="majorFaqText"  x-text="faq.manualFaq[3]">Once you've finished the theoretical component, you have the option to schedule an online conference with our instructor for the practical segment, which typically lasts around 20-30 minutes.
                            </div>
                        </div>
                        <div class="majorFaq">
                            <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                            <div class="majorFaqText"  x-text="faq.manualFaq[4]">The cost for manual handling training is 35€, with no additional charges for the self-assessment.</div>
                        </div>
                        <div class="majorFaq">
                            <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                            <div class="majorFaqText"  x-text="faq.manualFaq[5]">You have the flexibility to complete your course online at a time and place that suits your schedule.</div>
                        </div>
                        <div class="majorFaq">
                            <img src="{{asset("images/icons/right-arrow.png")}}" alt="">
                            <div class="majorFaqText"  x-text="faq.manualFaq[6]">Our courses are compatible with any internet-enabled device such as a laptop, mobile phone, or PC</div>
                        </div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton"  x-text="faq.manualFaq[7]">Manual Handling Practical Part</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="accText"  x-text="faq.manualFaq[8]">Once you've completed the entire theoretical section and passed the theoretical test, kindly send us a text message via WhatsApp at +353894631967 (TEXT ONLY on WhatsApp, no phone calls) to schedule the practical session with our team. The practical segment can be conducted live through a webinar room with an instructor and typically lasts 15-20 minutes. There are no additional fees for the practical segment; the course price includes both the theory and self-assessment components.</div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton"  x-text="faq.manualFaq[9]">Approval for Manual Handling Certificate</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div  class="accText"  x-text="faq.manualFaq[10]">The Manual Handling Course is delivered by NFQ Level 6</div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton"  x-text="faq.manualFaq[11]">Certification Delivery</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="accText"  x-text="faq.manualFaq[12]">Certificates are sent to the email used for registration and can also be downloaded and printed from our website. Access your course certificate promptly upon course completion. 📲📩
                        </div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton" x-text="faq.manualFaq[13]" >Do I need to pay additional charge for practical part?</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="accText"  x-text="faq.manualFaq[14]">NO additional payment is required to proceed with the practical segment. The course fee includes both the theory and self-assessment components.</div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton"  x-text="faq.manualFaq[15]">Money-Back Guarantee</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent"  x-text="faq.manualFaq[16]">
                        <div class="accText">We aim for your complete satisfaction with your purchase. Therefore, we provide a 15-day, no-hassle, no-questions-asked money-back guarantee if you're not entirely satisfied. To qualify for a valid refund claim, ensure you haven't completed the course or printed your certificate. Please email us your refund request, and our team will promptly assist you.
                        </div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton"  x-text="faq.manualFaq[17]">How can I schedule a Manual Handling Training session for a group of employees?</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="accText"  x-text="faq.manualFaq[18]">Attached is a PDF file containing comprehensive information and instructions to assist you throughout this process. This feature allows you to monitor your employees' progress, download their certificates upon course completion, and offers various other functionalities. Our system was designed to ensure transparency for all customers, particularly for employers and companies managing their employees' training. For personalized assistance in navigating this process for the first time and experiencing its ease and convenience, please feel free to call us at 0894631967. We're here to assist you.
                        </div>
                        <div class="faqMessage">
                            <div class="faqDownloadText"  x-text="faq.manualFaq[19]">Download here:</div>
                            <a href="{{route('infoPdf')}}"><img src="{{asset('images/icons/pdf.png')}}" class="pdfImg" alt=""></a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="faqBox">
                <div class="faqHeader">
                    <img src="{{asset("images/icons/info.png")}}" alt="">
                    <div class="faqTitle" x-text="faq.aboutFaq[0]">About our courses</div>
                </div>
                <div class="innerFaq">
                    <div class="actionAccordion">
                        <div class="accordionButton" x-text="faq.aboutFaq[1]">On what devices are your training courses functional?</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="accText" x-text="faq.aboutFaq[2]">You're able to access the training using any electronic device that has an internet connection.</div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton" x-text="faq.aboutFaq[3]">Are your instructors accredited?</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="accText" x-text="faq.aboutFaq[4]">All our instructors are members of CMIOSH (Chartered Member of IOSH),
                            indicating their affiliation with the Institution of Occupational Safety and Health.
                            They are qualified at NFQ Level 6, meeting the standards mandated by Irish Legislation and HSA, ensuring full compliance and competence.
                        </div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton" x-text="faq.aboutFaq[5]">Is it possible for me to access the training material once I've finished the course?</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="accText" x-text="faq.aboutFaq[6]"> You can utilize your username and password to log in and access the training materials 24/7, even after you've completed the training.</div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton" x-text="faq.aboutFaq[7]">For how long will I have access to my training, and can I revisit the course material after I've finished it?</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent" x-text="faq.aboutFaq[8]">
                        <div class="accText">There's no time limit for our customers to complete the course.
                            Each candidate can access the training anytime after completing the course using their personal login details received on the registration day. Additionally, they can reset these details on our website through the 'Forgot Password' section.
                            Whether you prefer splitting your training into multiple sessions or completing it in one go, you're free to learn at your own pace entirely.
                        </div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton" x-text="faq.aboutFaq[9]">Is it possible for me to enroll in a course if I don't reside in Ireland?</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="accText" x-text="faq.aboutFaq[10]"> Our course is accessible to anyone, regardless of their location. All you need is a device with an internet connection.
                            If you're taking the course from outside Ireland, please ensure that your chosen course covers the legislation specific to your country.
                            However, the course content remains identical worldwide, and the self-assessment is a standard requirement for all our training, irrespective of the country you're in.
                        </div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton" x-text="faq.aboutFaq[11]">Looking for a discount?</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent" x-text="faq.aboutFaq[12]">
                        <div class="accText">Certainly! For bulk purchases of 10 or more courses, you'll receive a 10% discount off the original price.
                            This discount is automatically calculated by our payment system when you add the specified number of courses to your cart.
                            Should you require any further assistance or information, please don't hesitate to contact our team at +353894631967 📲 or email us at info@irish-manualhandling.com.
                            We're here to help!
                        </div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton"  x-text="faq.aboutFaq[13]">What languages are offered for this training?</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="accText" x-text="faq.aboutFaq[14]">This course offers comprehensive content translated into six languages, specifically tailored to meet our customers' needs.
                            Upon registration, you'll be directed to the main homepage where you can choose your preferred language for the training.
                            Please note that the practical part and self-assessment are available only in English.
                            However, the course content is accessible in English, Polish, Spanish, Romanian, Russian, and Ukrainian languages.
                        </div>
                    </div>
                </div>
            </div>
            <div class="faqBox">
                <div class="faqHeader">
                    <img src="{{asset("images/icons/carts.png")}}" alt="">
                    <div class="faqTitle" x-text="faq.purchaseFaq[0]">Purchasing courses</div>
                </div>
                <div class="innerFaq">
                    <div class="actionAccordion">
                        <div class="accordionButton"  x-text="faq.purchaseFaq[1]">How can I get started?</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="accText"  x-text="faq.purchaseFaq[2]">You can access training on any electronic device as long as you have an internet connection.</div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton"  x-text="faq.purchaseFaq[3]">How can I buy multiple courses for my employees?</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent"  x-text="faq.purchaseFaq[4]">
                        <div class="accText">When purchasing training for your team, please add the number of courses you need to your basket.
                            After completing the purchase, you'll find them in the main menu under Billing > Packages.</div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton"  x-text="faq.purchaseFaq[5]">Is it possible to pay via invoice or directly through the website's payment system?</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="accText"  x-text="faq.purchaseFaq[6]">We offer two payment options:

                            The first and optimal choice is to pay through our website using our payment system, which accepts all major credit cards from any country. This allows immediate access to your course or courses without any delay.

                            The second option involves payment via bank transfer, requiring an invoice for payment. However, access to your courses is granted only after the payment is received and confirmed in our bank account. Please anticipate a delay of up to 24-48 hours, depending on your bank. In both cases, you will receive an invoice for each processed payment.
                        </div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton"  x-text="faq.purchaseFaq[7]">Will I receive any discounts if I purchase multiple courses?</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="accText"  x-html="faq.purchaseFaq[8]"> Our bulk discounts are automatically applied to orders that include a combination of courses. We provide the following discount for bulk purchases:

                            10% off for orders of 10 or more courses
                        </div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton"  x-text="faq.purchaseFaq[9]">Can I buy the course for someone else?</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent" >
                        <div class="accText"  x-text="faq.purchaseFaq[10]">If you intend to register only one individual – whether a person, an employee, or a family member – you may proceed by providing the candidate's details (full name and personal email address). This will enable them to receive their unique login credentials via email, granting access to our website round the clock, allowing them to take the course at their convenience.</div>
                    </div>
                </div>
            </div>
            <div class="faqBox">
                <div class="faqHeader">
                    <img src="{{asset("images/icons/login.png")}}" alt="">
                    <div class="faqTitle" x-text="faq.loginFaq[0]">Logging in</div>
                </div>
                <div class="innerFaq">
                    <div class="actionAccordion">
                        <div class="accordionButton" x-text="faq.loginFaq[1]">I've bought the training but I'm unsure about the next steps.</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="accText">
                            <p  x-html="faq.loginFaq[2]">To activate your course, please click on the following link: <a href="{{route('home')}}" style="color: blue">"https://irish-manualhandling.com/packages"</a>  If you encounter any difficulties during this process, please don't hesitate to reach out to our friendly Support Team. You can contact them by calling +353894631967 or by emailing us at mailto
                                <a href="mailto:info@irish-manualhandling.com" style="color: blue">info@irish-manualhandling.com</a>
                            </p>
                        </div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton"  x-text="faq.loginFaq[3]">I’ve forgotten my password.</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="accText"  x-html="faq.loginFaq[4]">
                            If you encounter difficulties completing your course, we suggest clearing your browser's cache. In many cases, after logging back into your account, you'll be able to proceed without any issues.

                            If this solution doesn't resolve the problem and you're still experiencing difficulties, please contact our Support Team. You can reach us by calling +353894631967 or emailing us at mailto:
                            <a href="mailto:info@irish-manualhandling.com" style="color: blue">mailto:info@irish-manualhandling.com</a></p> For an optimal experience, we recommend completing our training using Google Chrome.
                        </div>
                    </div>


                    <div class="actionAccordion">
                        <div class="accordionButton"  x-text="faq.loginFaq[5]">I'm encountering difficulties while trying to complete my training.</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent"  x-html="faq.loginFaq[6]">
                        <div class="accText">If you encounter challenges while completing your course, we suggest clearing your browser's cache, which can be done within your browser settings. Often, upon logging back into your account, this resolves most issues.

                            Should this solution not resolve the problem and you continue experiencing difficulties, please contact our Support Team.
                            <a href="mailto:info@irish-manualhandling.com" style="color: blue">mailto:info@irish-manualhandling.com</a>
                            For an optimal learning experience, we recommend completing our training using Google Chrome.
                        </div>
                    </div>
                </div>
            </div>


            <div class="faqBox">
                <div class="faqHeader">
                    <img src="{{asset("images/icons/sunny.png")}}" alt="">
                    <div class="faqTitle" x-text="faq.assesFaq[0]"> Assesments and Certificates</div>
                </div>
                <div class="innerFaq">
                    <div class="actionAccordion">
                        <div class="accordionButton" x-text="faq.assesFaq[1]">Am I allowed to retake the course or the final test if I fail?</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="accText"  x-text="faq.assesFaq[2]">No need to worry. You have three years of complimentary access to the entire course content and unlimited free attempts for the final test in case you don't pass initially.</div>
                    </div>

                    <div class="actionAccordion">
                        <div class="accordionButton"  x-text="faq.assesFaq[3]">How can I receive my certificate? What if it’s lost?</div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent">
                        <div class="accText"  x-text="faq.assesFaq[4]">Once your training has been completely paid for, upon finishing your course, you can instantly download an electronic PDF copy of your certificate.</div>
                    </div>


                    <div class="actionAccordion">
                        <div class="accordionButton"  x-text="faq.assesFaq[5]">How can I  receive my certificate?
                            What if it’s lost?
                        </div>
                        <div id="uppDownArrow">
                            <svg id="dropArrow" class=" dropArrow svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="accordionContent"  x-text="faq.assesFaq[6]">
                        <div class="accText">Upon full payment for your training, you can instantly download an electronic PDF version of your certificate upon course completion; physical cards are not issued. Additionally, you'll receive three years of free access to your certificate in case of loss. To access your certificate, log in to our website using your personal login details and locate the 'Download Certificate' button on the homepage. Our system will promptly email your certificate. If you've forgotten your login details, you can reset them on our homepage by selecting the 'Forgot Password' section. A new personalized link and password will be instantly emailed to you (please check your spam and junk folders).
                            <br>
                            This course offers comprehensive content translated into five languages, specifically tailored to meet our customers' needs. Upon registration, you'll be directed to the main homepage where you can choose your preferred language for the training. The practical part/self-assessment is available only in English, while the course content is accessible in English/Polish/Spanish/Romanian/Russian/Ukrainian languages.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
