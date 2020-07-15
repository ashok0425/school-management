
@extends('website.layouts.main')

@section('page')
<!--body wrapper starts here-->
<section class="body-wrapper">
    <!--sllider image starts here-->

    <div id="demo" class="carousel slide Lyceex-slide" data-ride="carousel">
        <div class="Upslider">
            <h6>We have developed resources to help you through this challenging time. <a href="#">Click here </a>to learn more.</h6>
        </div>
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/slider-1.jpg" alt="slider -1">
            </div>
            <div class="carousel-item">
                <img src="images/slider-2.jpg" alt="slider -1">
            </div>
            <div class="carousel-item">
                <img src="images/slider-3.jpg" alt="slider -1">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>
    <div class="Belowslider">
        <h6>Learning made easy. Our Lyceex experts offer sessions daily on all things Lyceex.</h6>
    </div>
    <!--sllider image ends here-->

    <!--about section starts here-->
    <section class="About section-paddings">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="section-headings">What We Offer For Growth Your Study</h5>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur

                    </p>
                    <button class="btn btn-rounded lyceex-primary">Register Now</button>

                </div>
                <div class="col-md-4 graduation-cap">
                    <img src="images/Graduation-Illustration.png">
                </div>
            </div>

        </div>
    </section>
    <!--about section ends here-->

    <!--experience starts here-->
    <section class="Experience section-paddings">
        <div class="container">
            <h5 class="text-center section-md-headings">One Consistent Enterprise Experience.</h5>
            <h6 class="text-center section-md-sm-headings">A single university with a load of courses, tailored
                to satisfy any student’s needs</h6>

            <div class="row">
                <div class="col-md-2 experience-box">
                    <i class="fas fa-video"></i>
                    <h5>Meetings</h5>
                </div>
                <div class="col-md-2 experience-box">
                    <i class="fas fa-compact-disc"></i>
                    <h5>Video Webinar</h5>
                </div>
                <div class="col-md-2 experience-box">
                    <i class="fas fa-video"></i>
                    <h5>Conference Room</h5>
                </div>
                <div class="col-md-2 experience-box">
                    <i class="fas fa-podcast"></i>
                    <h5>Phone System</h5>
                </div>
                <div class="col-md-2 experience-box">
                    <i class="fas fa-podcast"></i>
                    <h5>Call System</h5>
                </div>
                <div class="col-md-2 experience-box">
                    <i class="fas fa-video"></i>
                    <h5>Chat</h5>
                </div>

            </div>
        </div>
    </section>
    <!--experience ends here-->

    <!--review section starts here-->
    <section class="Review bg-white section-paddings">
        <div class="container">
            <h5 class="text-center section-md-headings">Lyceex is Ranked #1</h5>
            <h6 class="text-center section-md-sm-headings">in Customer Reviews</h6>

            <div class="row">
                <div class="col-md-4">
                    <div class="review-grid">
                        <img class="partner-img" src="images/partner-1.png">
                        <p>Lyceex is super natural and easy to use - just download it, click, and you're in. I use Zoom on an airplane, in the car, in my house, in the office - everywhere</p>
                        <span class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                          <span>4.5 out of 5</span>
                        </span>
                        <button class="btn btn-sm btn-outline-primary btn-rounded">Learn More</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="review-grid">
                        <img class="partner-img" src="images/partner-2.png">
                        <p>Lyceex is super natural and easy to use - just download it, click, and you're in. I use Lyceex on an airplane, in the car, in my house, in the office - everywhere</p>
                        <span class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                          <span>4.5 out of 5</span>
                        </span>
                        <button class="btn btn-sm btn-outline-primary btn-rounded">Learn More</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="review-grid">
                        <img class="partner-img" src="images/partner-3.png">
                        <p>Lyceex is super natural and easy to use - just download it, click, and you're in. I use Lyceex on an airplane, in the car, in my house, in the office - everywhere</p>
                        <span class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                          <span>4.5 out of 5</span>
                        </span>
                        <button class="btn btn-sm btn-outline-primary btn-rounded">Learn More</button>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--review section ends here-->

    <!--service tab starts here-->
    <section class="ServiceTab  section-paddings">
        <div class="container">
            <h5 class="text-center section-md-headings">One Consistent Enterprise Experience.</h5>
            <h6 class="text-center section-md-sm-headings">A single university with a load of courses, tailored
                to satisfy any student’s needs</h6>

            <div class="row">
                <div class="col-md-12">
                    <nav >
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                <i class="fas fa-user"></i>
                                <h5>Role Management</h5>
                            </a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                <i class="fas fa-file-invoice"></i>
                                <h5>Billing Management</h5>
                            </a>
                            <a class="nav-item nav-link" id="nav-contact-tab1" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                                <i class="fas fa-chart-line"></i>
                                <h5>Examination Management</h5>
                            </a>
                            <a class="nav-item nav-link" id="nav-about-tab2" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">
                                <i class="fas fa-diagnoses"></i>
                                <h5>Library Management</h5>
                            </a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                                <i class="fas fa-chart-line"></i>
                                <h5>Billing Management</h5>
                            </a>
                            <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">
                                <i class="fas fa-video"></i>
                                <h5>Staff Management</h5>
                            </a>
                        </div>
                    </nav>
                    <div class="tab-content  px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="images/tab-img-1.png" style="width: 100%;" class="tab-img">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="section-headings">What We Offer For Growth Your Study</h5>
                                    <h6 class=" section-sm-headings">A single university with a load of courses, tailored
                                        to satisfy any student’s needs</h6>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur

                                    </p>
                                    <button class="btn  btn-rounded lyceex-primary m-r-20 ">Watch Video</button>
                                    <button class="btn  btn-rounded btn-outline-primary">Learn More</button>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="section-headings">What We Offer For Growth Your Study</h5>
                                    <h6 class=" section-sm-headings">A single university with a load of courses, tailored
                                        to satisfy any student’s needs</h6>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur

                                    </p>
                                    <button class="btn  btn-rounded lyceex-primary m-r-20">Watch Video</button>
                                    <button class="btn  btn-rounded btn-outline-primary">Learn More</button>
                                </div>
                                <div class="col-md-4">
                                    <img src="images/tab-img-1.png" style="width: 100%;" class="tab-img">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="images/tab-img-1.png" style="width: 100%;" class="tab-img">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="section-headings">What We Offer For Growth Your Study</h5>
                                    <h6 class=" section-sm-headings">A single university with a load of courses, tailored
                                        to satisfy any student’s needs</h6>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur

                                    </p>
                                    <button class="btn  btn-rounded lyceex-primary m-r-20">Watch Video</button>
                                    <button class="btn  btn-rounded btn-outline-primary">Learn More</button>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="section-headings">What We Offer For Growth Your Study</h5>
                                    <h6 class=" section-sm-headings">A single university with a load of courses, tailored
                                        to satisfy any student’s needs</h6>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur

                                    </p>
                                    <button class="btn  btn-rounded lyceex-primary m-r-20   ">Watch Video</button>
                                    <button class="btn  btn-rounded btn-outline-primary">Learn More</button>
                                </div>
                                <div class="col-md-4">
                                    <img src="images/tab-img-1.png" style="width: 100%;" class="tab-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--service tab ends here-->

    <!--mid slider section starts-->
    <section class="MidSlider">
        <div id="Mid-slide" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#Mid-slide" data-slide-to="0" class="active"></li>
                <li data-target="#Mid-slide" data-slide-to="1"></li>
                <li data-target="#Mid-slide" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/mid-slider.jpg" alt="Los Angeles" width="100%" height="500">
                    <div class="carousel-caption">
                        <h4>"We like that anybody on the go can use it. We are everywhere, so it's very
                            important to have the most easy way to go and start meetings."
                        </h4>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/mid-slider-2.jpg" alt="Chicago" width="100%" height="500">
                    <div class="carousel-caption">
                        <h4>"We like that anybody on the go can use it. We are everywhere, so it's very
                            important to have the most easy way to go and start meetings."
                        </h4>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/mid-slider-3.jpg" alt="New York" width="100%" height="500">
                    <div class="carousel-caption">
                        <h4>"We like that anybody on the go can use it. We are everywhere, so it's very
                            important to have the most easy way to go and start meetings."
                        </h4>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#Mid-slide" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#Mid-slide" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>


    </section>
    <!--mid slider section ends-->

    <!--Partners section  starts here-->
    <section class="Partners  bg-off-white section-paddings">
        <div class="container">
            <h5 class="text-center section-md-headings">Our Partners.</h5>
            <div class="row">
                <div class="col-md-2 PatnerBox">
                    <img src="images/partner1.png" width="100%">
                </div>
                <div class="col-md-2 PatnerBox">
                    <img src="images/partner2.png" width="100%">
                </div>
                <div class="col-md-2 PatnerBox">
                    <img src="images/partner3.jpg" width="100%">
                </div>
                <div class="col-md-2 PatnerBox">
                    <img src="images/partner1.png" width="100%">
                </div>
                <div class="col-md-2 PatnerBox">
                    <img src="images/partner2.png" width="100%">
                </div>
            </div>

        </div>
    </section>
    <!--Partners section  ends here-->

    <!--Why Us section starts here-->
    <section class="WhyUs bg-white  section-paddings">
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
                    <img src="images/recognized1.png" width="100%">
                </div>
                <div class="col-md-2 PatnerBox">
                    <img src="images/recognozed2.png" width="100%">
                </div>
                <div class="col-md-2 PatnerBox">
                    <img src="images/recognized3.png" width="100%">
                </div>
                <div class="col-md-2 PatnerBox">
                    <img src="images/recognozed4.png" width="100%">
                </div>
                <div class="col-md-2 PatnerBox">
                    <img src="images/recognozed2.png" width="100%">
                </div>
            </div>

        </div>
    </section>
    <!--Recognized section  ends here-->

    <!--subscribe sectioon starts here-->
    <section class="Subscribe bg-white  section-paddings">
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
@endsection
