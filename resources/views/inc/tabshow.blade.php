<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                 aria-selected="false">Details</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                 aria-selected="false">Comments</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" id="waiver-tab" data-toggle="tab" href="#waiver" role="tab" aria-controls="waiver"
                 aria-selected="false">Waiver</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>{{$post->description}}</p>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h5><b>Event Location :</b></h5>
                                </td>
                                <td>
                                    <h5>{{$post->event_address}}, {{$post->event_city}}, {{$post->event_postcode}}, {{$post->event_state}}, {{$post->event_country}} </h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5><b>Event Date :</b></h5>
                                </td>
                                <td>
                                    <h5>{{$post->event_date}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5><b>Start Time :</b></h5>
                                </td>
                                <td>
                                    <h5>{{$post->event_time}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5><b>Event End Date :</b></h5>
                                </td>
                                <td>
                                    <h5>{{$post->event_enddate}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5><b>Event End Time :</b></h5>
                                </td>
                                <td>
                                    <h5>{{$post->event_endtime}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5><b>Registration Open Date :</b></h5>
                                </td>
                                <td>
                                    <h5>{{$post->reg_opendate}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5><b>Registration Open Time :</b></h5>
                                </td>
                                <td>
                                    <h5>{{$post->reg_opentime}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5><b>Registration Close Date :</b></h5>
                                </td>
                                <td>
                                    <h5>{{$post->reg_closedate}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5><b>Registration Close Time :</b></h5>
                                </td>
                                <td>
                                    <h5>{{$post->reg_closetime}}</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="comment_list">
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/review-1.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2018 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo</p>
                            </div>
                            <div class="review_item reply">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/review-2.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2018 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo</p>
                            </div>
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/review-3.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2018 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Post a comment</h4>
                            <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
            
            <div class="tab-pane fade" id="waiver" role="tabpanel" aria-labelledby="waiver-tab">
                    <h5>By clicking register, you are agreed to this event waiver</h5><br>
                    <h6>{{$post->event_waiver}}</h6>
               
            </div>
        </div>
    </section>