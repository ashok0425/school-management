@extends('website.layouts.main')

@section('page')

<!--body wrapper starts here-->
<section class="body-wrapper">
    <!--sllider image starts here-->
    <div id="page-breadcrumb" >
        <div class="upslider">
            <h6>We have developed resources to help you through this challenging time. <a href="#">Click here </a>to learn more.</h6>
        </div>
        <img src="images/contact-banner.jpg"  width="100%" height="500" class="img img-responsive">
        <div class="overlay-page">
            <div class="breadcrumb-title">
                <h5 class="text-white section-headings">Gallery</h5>
                </div>
            </div>

        </div>
    
    <!--sllider image ends here-->

    <!--Gallery  starts here-->
    <section class="contact-icon section-paddings">
        <div class="container">
            <div class="row  ">
                @foreach ($gallery as $gallery)
                <div class="col-md-3">
<a href="{{__setlink('gallery/images',['id'=>$gallery->id])}}" class="text-dark">
                    <div class="card">
                        <div class="card-header">
                           <h5 >
                           {{$gallery->title}}
                           </h5>
                        </div>
                        <div class="card-body">
                            <img src=" {{asset('storage/'.$gallery->thumbnail)}}" alt="smartonline gallery" width="200" class="img-fluid">
                        </div>
                        <div class="card-footer">
                             {{$gallery->detail}}
                        </div>
                    </div>
                </a>
                  </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Gallery icon ends here-->




</section>
<!--body wrapper ends here-->



@endsection
