@extends('website.layouts.main')
@section('page')
<!--body wrapper starts here-->
<section class="body-wrapper">
    <!--sllider image starts here-->
    <div id="page-breadcrumb" >
        <div class="upslider">
            <h6>We have developed resources to help you through this challenging time. <a href="#">Click here </a>to learn more.</h6>
        </div>
        <img src="images/priceBanner.jpg"  class="img img-responsive" width="100%" height="500">
        <div class="overlay-page">
            <div class="breadcrumb-title">
                <h5 class="text-center text-white section-md-headings">{{$term->title}}</h5>
            </div>

        </div>
    </div>
    <!--sllider image ends here-->

    <!--contents faq starts here-->
    <section class="faqheadings section-paddings">
        <div class="container">
            <div class="row faqhead">
              {!!$term->detail !!}     
        </div>
    </div>

    </section>





    <!--mobile meeting css tarts here-->
    <section class="mobilemeetings section-paddings">
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
    <section class="Partners bg-white section-paddings">
        <div class="container">
            <h5 class="text-center section-md-headings">Our Partners.</h5>
            <div class="row">
                <div class="col-md-2 partnerbox">
                    <img src="images/partner1.png" class="img img-responsive" width="100%">
                </div>
                <div class="col-md-2 partnerbox">
                    <img src="images/partner2.png" class="img img-responsive" width="100%">
                </div>
                <div class="col-md-2 partnerbox">
                    <img src="images/partner3.jpg" class="img img-responsive" width="100%">
                </div>
                <div class="col-md-2 partnerbox">
                    <img src="images/partner1.png" class="img img-responsive" width="100%">
                </div>
                <div class="col-md-2 partnerbox">
                    <img src="images/partner2.png" class="img img-responsive" width="100%">
                </div>
            </div>

        </div>
    </section>
    <!--Partners section  ends here-->

    <!--Why Us section starts here-->
    <section class="whyus  section-paddings">
        <div class="container">
            <h5 class="text-center section-md-headings">Why Lyceex?</h5>
            <h6 class="text-center section-md-sm-headings">Reason to Choose us </h6>

            <div class="row">
                <div class="col-md-2 whyusblog">
                    <div class="icon-box"><i class="fas fa-thumbs-up"></i></div>
                    <p>One consistent enterprise
                        experience for all use cases
                    </p>
                </div>
                <div class="col-md-2 whyusblog">
                    <div class="icon-box"><i class="fas fa-cloud"></i></div>
                    <p>Most affordable, straightf
                        orward pricing
                    </p>
                </div>
                <div class="col-md-2 whyusblog">
                    <div class="icon-box"><i class="fas fa-user-friends"></i></div>
                    <p>Up to 1,000 video participants
                        & 10,000 viewers


                    </p>
                </div>
                <div class="col-md-2 whyusblog">
                    <div class="icon-box"><i class="fas fa-shield-alt"></i></div>
                    <p>Engineered & optimized to
                        work reliably


                    </p>
                </div>
                <div class="col-md-2 whyusblog">
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
    <section class="recognized bg-white section-paddings">
        <div class="container">
            <h5 class="text-center section-md-headings">Recognized In</h5>
            <div class="row">
                <div class="col-md-2 partnerbox">
                    <img src="images/recognized1.png" width="100%">
                </div>
                <div class="col-md-2 partnerbox">
                    <img src="images/recognozed2.png" width="100%">
                </div>
                <div class="col-md-2 partnerbox">
                    <img src="images/recognized3.png" width="100%">
                </div>
                <div class="col-md-2 partnerbox">
                    <img src="images/recognozed4.png" width="100%">
                </div>
                <div class="col-md-2 partnerbox">
                    <img src="images/recognozed2.png" width="100%">
                </div>
            </div>

        </div>
    </section>
    <!--Recognized section  ends here-->

    <!--subscribe sectioon starts here-->
    <section class="subscribe  section-paddings">
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
