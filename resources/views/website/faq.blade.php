@extends('website.layouts.main')

@section('page')


<!--body wrapper starts here-->
<section class="body-wrapper">
    <!--sllider image starts here-->
    <div id="Page-Breadcrumb" >
        <div class="Upslider">
            <h6>We have developed resources to help you through this challenging time. <a href="#">Click here </a>to learn more.</h6>
        </div>
        <img src="images/banner_faq.png"  width="100%" height="500" class="img img-responsive">
        <div class="overlay-page">
            <div class="Breadcrumb-title">
                <h5 class="text-white section-headings">Frequently Asked Questions</h5>

                <div class="Slider-input">
                    <form action="#" class="newsletter_form">
                        <input type="text" placeholder="Enter Your query">
                        <button class="btn btn-primary btn-rounded"> <a href="#">Search</a></button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--sllider image ends here-->

    <!--contents faq starts here-->
    <section class="FaqHeadings section-paddings">
        <div class="container">
            <h5 class="section-headings">Everything that you need to know about Lyceex</h5>
            <div class="row FaqHead">
                <div class="col-md-4">
                    <div class="faq-title"><a href="#">Getting started with Lyceex</a></div>
                    <div class="faq-title"><a href="#">Lyceex webinars</a></div>
                    <div class="faq-title"><a href="#">Search Plans and Pricing</a></div>
                    <div class="faq-title"><a href="#">Direct Messages</a></div>
                    <div class="faq-title"><a href="#">webinars</a></div>
                    <div class="faq-title"><a href="#">Lyceex webinars</a></div>
                    <div class="faq-title"><a href="#">Search Plans and Pricing</a></div>
                    <div class="faq-title"><a href="#">Direct Messages</a></div>
                </div>
                <div class="col-md-4">
                    <div class="faq-title"><a href="#">Search Plans and Pricing</a></div>
                    <div class="faq-title"><a href="#">Getting started with Lyceex</a></div>
                    <div class="faq-title"><a href="#">Lyceex webinars</a></div>
                    <div class="faq-title"><a href="#">Search Plans and Pricing</a></div>
                    <div class="faq-title"><a href="#">Direct Messages</a></div>
                    <div class="faq-title"><a href="#">webinars</a></div>
                    <div class="faq-title"><a href="#">Direct Messages</a></div>
                    <div class="faq-title"><a href="#">webinars</a></div>

                </div>
                <div class="col-md-4">

                    <div class="faq-title"><a href="#">Search Plans and Pricing</a></div>
                    <div class="faq-title"><a href="#">Direct Messages</a></div>
                    <div class="faq-title"><a href="#">webinars</a></div>
                    <div class="faq-title"><a href="#">Direct Messages</a></div>
                    <div class="faq-title"><a href="#">webinars</a></div>
                    <div class="faq-title"><a href="#">Search Plans and Pricing</a></div>
                    <div class="faq-title"><a href="#">Getting started with Lyceex</a></div>
                    <div class="faq-title"><a href="#">Lyceex webinars</a></div>
                </div>
            </div>
        </div>
    </section>

    <section class="AccordingFaq section-paddings">
        <div class="container">
            <div id="accordion" class="myaccordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Getting started with Lyceex
                                <span class="fa-stack fa-sm">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                                  </span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <p>Where do I download the latest version of Lyceex?
                                You can download the latest version of Lyceex from our Download Center. Learn more about downloading Lyceex.</p>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Search Plans and Pricing
                                <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                          </span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <p>Where do I download the latest version of Lyceex?
                                You can download the latest version of Lyceex from our Download Center. Learn more about downloading Lyceex.</p>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Lyceex webinars
                                <span class="fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                                  </span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                           <p>Where do I download the latest version of Lyceex?
                               You can download the latest version of Lyceex from our Download Center. Learn more about downloading Lyceex.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>




    <!--mobile meeting css tarts here-->
    <section class="MobileMeetings section-paddings">
        <div class="container">
            <div class="row">

                <div class="col-md-5 Modernize">
                    <img src="images/mobile-meetings.png" class="img img-responsive">
                </div>
                <div class="col-md-7">
                    <h5 class="section-headings">Modern Cloud Phone Solution</h5>
                    <p>Lyceex Meetings for desktop and mobile provides the tools to make every meeting a great one.</p>
                    <ul>
                        <li>
                            Focus on your meeting – click record to leave the note taking to Lyceex’s auto-generated, searchable transcripts
                        </li>
                        <li>
                            Share and play videos with full audio and video transmit without uploading the content

                        </li>
                        <li>Look meeting-ready with Virtual Backgrounds and Touch Up My Appearance
                        </li>
                        <li>
                            Focus on your meeting – click record to leave the note taking to Lyceex’s auto-generated, searchable transcripts
                        </li>
                        <li>
                            Share and play videos with full audio and video transmit without uploading the content

                        </li>
                        <li>Look meeting-ready with Virtual Backgrounds and Touch Up My Appearance
                        </li>
                    </ul>
                    <button class="btn btn-rounded lyceex-primary m-r-20">Get Now</button>
                    <button class="btn  btn-rounded btn-outline-primary">Learn More</button>


                </div>
            </div>

        </div>
    </section>
    <!--mobile meeting css ends here-->



    <!--Partners section  starts here-->
    <section class="Partners bg-off-white  section-paddings">
        <div class="container">
            <h5 class="text-center section-md-headings">Our Partners.</h5>
            <div class="row">
                <div class="col-md-2 PatnerBox">
                    <img src="images/partner1.png" class="img img-responsive" width="100%">
                </div>
                <div class="col-md-2 PatnerBox">
                    <img src="images/partner2.png" class="img img-responsive"width="100%">
                </div>
                <div class="col-md-2 PatnerBox">
                    <img src="images/partner3.jpg" class="img img-responsive" width="100%">
                </div>
                <div class="col-md-2 PatnerBox">
                    <img src="images/partner1.png" class="img img-responsive" width="100%">
                </div>
                <div class="col-md-2 PatnerBox">
                    <img src="images/partner2.png" class="img img-responsive" width="100%">
                </div>
            </div>

        </div>
    </section>
    <!--Partners section  ends here-->

    <!--Why Us section starts here-->
    <section class="WhyUs bg-white section-paddings">
        <div class="container">
            <h5 class="text-center section-md-headings">Why Lyceex?</h5>
            <h6 class="text-center section-md-sm-headings">Reason to Choose us </h6>

            <div class="row">
                <div class="col-md-2 WhyUsBlog">
                    <div class="icon-box"><i class="fas fa-thumbs-up"></i></div>
                    <p>One consistent enterprise
                        experience for all use cases
                    </p>
                </div>
                <div class="col-md-2 WhyUsBlog">
                    <div class="icon-box"><i class="fas fa-cloud"></i></div>
                    <p>Most affordable, straightf
                        orward pricing
                    </p>
                </div>
                <div class="col-md-2 WhyUsBlog">
                    <div class="icon-box"><i class="fas fa-user-friends"></i></div>
                    <p>Up to 1,000 video participants
                        & 10,000 viewers


                    </p>
                </div>
                <div class="col-md-2 WhyUsBlog">
                    <div class="icon-box"><i class="fas fa-shield-alt"></i></div>
                    <p>Engineered & optimized to
                        work reliably


                    </p>
                </div>
                <div class="col-md-2 WhyUsBlog">
                    <div class="icon-box"><i class="fa fa fa-plus"></i></div>
                    <p>Most affordable, straightf
                        orward pricing

                    </p>
                </div>
            </div>

        </div>
    </section>
    <!--Why Us section ends here-->

    <!--Recognized section  starts here-->
    <section class="Recognized bg-off-white section-paddings">
        <div class="container">
            <h5 class="text-center section-md-headings">Recognized In</h5>
            <div class="row">
                <div class="col-md-2 PatnerBox">
                    <img src="images/recognized1.png" class="img img-responsive" width="100%">
                </div>
                <div class="col-md-2 PatnerBox">
                    <img src="images/recognozed2.png" class="img img-responsive" width="100%">
                </div>
                <div class="col-md-2 PatnerBox">
                    <img src="images/recognized3.png" class="img img-responsive" width="100%">
                </div>
                <div class="col-md-2 PatnerBox">
                    <img src="images/recognozed4.png" class="img img-responsive"  width="100%">
                </div>
                <div class="col-md-2 PatnerBox">
                    <img src="images/recognozed2.png" class="img img-responsive" width="100%">
                </div>
            </div>

        </div>
    </section>
    <!--Recognized section  ends here-->

    <!--subscribe sectioon starts here-->
    <section class="Subscribe bg-white section-paddings">
        <div class="container">
            <h5 class="text-center section-md-headings">Lyceex is Ranked #1</h5>
            <h6 class="text-center section-md-sm-headings">in Customer Reviews</h6>

            <div class="footer-input">
                <form action="#" class="newsletter_form">
                    <input type="text" placeholder="Enter Your Email">
                    <button class="btn btn-primary btn-rounded"> <a href="#">Subscribe</a></button>
                </form>
            </div>
        </div>
    </section>
    <!--subscribe sectioon ends here-->

</section>
<!--body wrapper ends here-->


@endsection