<!--==========================
      Contact Section
    ============================-->
<section id="contact">
    <div class="container">
        <div class="row wow fadeInUp">

            <div class="col-lg-4 col-md-4">
                <div class="contact-about">
                    <h3>BKSDA YOGYAKARTA</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
<!--                    <div class="social-links">-->
<!--                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>-->
<!--                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>-->
<!--                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>-->
<!--                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>-->
<!--                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>-->
<!--                    </div>-->
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="info">
                    <div>
                        <i class="ion-ios-location-outline"></i>
                        <p>Jl. Rajiman Km. 0,4 Wadas, Tridadi, Sleman, Yogyakarta 55514</p>
                    </div>

                    <div>
                        <i class="ion-ios-email-outline"></i>
                        <p>bksdajogja@gmail.com atau <br> bksda_yogya@yahoo.com</p>
                    </div>

                    <div>
                        <i class="ion-ios-telephone-outline"></i>
                        <p>0274-864203</p>
                    </div>

                </div>
            </div>

            <div class="col-lg-5 col-md-8">
                <div class="form">
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    <form action="/pengunjung/proses/feedback.php" method="post" role="form" class="contactForm">
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validation"></div>
                        </div>
                        <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section><!-- #contact -->