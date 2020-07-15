@extends('website.layouts.main')

@section('page')


<!--body wrapper starts here-->
<section class="body-wrapper">
    <!--sllider image starts here-->
    <div id="Page-Breadcrumb" >
        <div class="Upslider">
            <h6>We have developed resources to help you through this challenging time. <a href="#">Click here </a>to learn more.</h6>
        </div>
        <img src="images/contact-banner.jpg"  width="100%" height="500" class="img img-responsive">
        <div class="overlay-page">
            <div class="Breadcrumb-title">
                <h5 class="text-white section-headings">Keep In Touch</h5>
                </div>
            </div>

        </div>
    </div>
    <!--sllider image ends here-->

    <!--Contact icon starts here-->
    <section class="ContactIcon section-paddings">
        <div class="container">
            <div class="row  justify-content-center">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4 text-center border-right ">
                            <div class="icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <p><span>Address:</span>Itahari, Sunsari, Nepal</p>
                        </div>
                        <div class="col-md-4 text-center border-height border-right">
                            <div class="icon">
                                <i class="fas fa-phone-volume"></i>
                            </div>
                            <p><span>Phone:</span> <a href="tel://1234567920">	  +588854596, 985226255</a></p>
                        </div>
                        <div class="col-md-4 text-center ">
                            <div class="icon">
                                <i class="far fa-envelope-open"></i>
                            </div>
                            <p><span>Email:</span> <a href="mailto:info@yoursite.com">	info@lyceexmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact icon ends here-->

    <!--Contact form starts here-->
    <section class="ContactForm bg-off-white section-paddings">
        <div class="Container">
            <div class="row  justify-content-center ">
                <div class="col-md-8 mb-md-5 ">
                    <h2 class="text-center">If you got any questions <br>please do not hesitate to send us a message</h2>
                    <form action="#" class="bg-light shadow p-5 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!--Contact form ends here-->

    <!--Contact maps starts here-->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12301.513435481704!2d-96.04069516490034!3d39.57362236133188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87be3e79433f6007%3A0x86baec447b34422!2sAmerica%20City%2C%20KS%2066540%2C%20USA!5e0!3m2!1sen!2snp!4v1594798997246!5m2!1sen!2snp" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <!--Contact maps ends here-->


</section>
<!--body wrapper ends here-->



@endsection