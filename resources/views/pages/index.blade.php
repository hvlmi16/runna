@extends ('layout.app')

@section('content')

    <div class = "jumbotron text-center">
        <h1> <?php echo $title; ?> </h1>
         <p> This is Runna application for FYP 2 Project </p>
    </div>
    
    {{-- Start Features Area --}}
    <section class="features-area section_gap py-4 ">
        <div class="container ">
            <div class="row features-inner">
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon1.png" alt="">
                        </div>
                        <h6>Easy Registration</h6>
                        <p>Reduce redundancy upon registering</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon2.png" alt="">
                        </div>
                        <h6>Greater Event</h6>
                        <p>Review the event you joined</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon3.png" alt="">
                        </div>
                        <h6>24/7 Support</h6>
                        <p>Our crew always ready to serve</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon4.png" alt="">
                        </div>
                        <h6>Secure Payment</h6>
                        <p>Secure you payment towards organizer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
