@extends('website.layouts.main')

@section('page')

<!--body wrapper starts here-->
<section class="body-wrapper">
    <!--sllider image starts here-->
    <div id="page-breadcrumb" >
        <div class="upslider">
            <h6>We have developed resources to help you through this challenging time. <a href="#">Click here </a>to learn more.</h6>
        </div>
        <img src="{{asset('images/contact-banner.jpg')}}"  width="100%" height="500" class="img img-responsive">
        <div class="overlay-page">
            <div class="breadcrumb-title">
                <h5 class="text-white section-headings">{{$about->title}}</h5>
                </div>
            </div>

        </div>
    
    <!--sllider image ends here-->

    <!--About  starts here-->
    <section class="contact-icon section-paddings">
        <div class="container">
            <div class="row  ">
                <div class="col-md-12">
                    <div class="card">
                        
                        <div class="card-body">
                         <p>
                            {{$about->detail}}
                         </p>
                        </div>
                       
                  </div>
            </div>
        </div>
    </section>
    <!--About ends here-->
</section>
<!--body wrapper ends here-->

@endsection
