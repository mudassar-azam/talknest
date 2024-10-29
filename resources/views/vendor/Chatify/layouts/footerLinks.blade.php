<script src="https://js.pusher.com/7.2.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@3.0.3/dist/index.min.js"></script>
<script >
    // Gloabl Chatify variables from PHP to JS
    window.chatify = {
        name: "{{ config('chatify.name') }}",
        sounds: {!! json_encode(config('chatify.sounds')) !!},
        allowedImages: {!! json_encode(config('chatify.attachments.allowed_images')) !!},
        allowedFiles: {!! json_encode(config('chatify.attachments.allowed_files')) !!},
        maxUploadSize: {{ Chatify::getMaxUploadSize() }},
        pusher: {!! json_encode(config('chatify.pusher')) !!},
        pusherAuthEndpoint: '{{route("pusher.auth")}}'
    };
    window.chatify.allAllowedExtensions = chatify.allowedImages.concat(chatify.allowedFiles);
</script>
<script src="{{ asset('js/chatify/utils.js') }}"></script>
<script src="{{ asset('js/chatify/code.js') }}"></script>


<!-- Footer -->
<footer class="main-footer" style="background-image:url{{asset('assets/images/background/pattern-6.png')}}">
    <div class="auto-container">
        <!-- Widgets Section -->
        <div class="widgets-section">
            <div class="row clearfix">

                <!-- Big Column -->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget logo-widget">
                                <div class="logo">
                                    <a href="index.html">
                                    <!-- <img src="{{asset('assets/images/footer-logo.png')}}" alt="" /> -->
                                        <h4 style="color:#93B74B;">TalkNest</h4>
                                    </a>
                                </div>
                                <div class="text">We work with a passion of taking challenges and creating
                                    new ones in advertising sector.</div>
                                <a href="#" class="theme-btn about-btn">About us</a>
                            </div>
                        </div>

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget newsletter-widget">
                                <h4>Newsletter</h4>
                                <div class="text">Subscribe our newsletter to get our latest update & news
                                </div>

                                <!-- Email Box -->
                                <div class="email-box">
                                    <form method="post"
                                          action="https://html.themexriver.com/intime/intime/contact.html">
                                        <div class="form-group">
                                            <input type="email" name="search-field" value=""
                                                   placeholder="Your mail address" required>
                                            <button type="submit"><span
                                                    class="icon fa-solid fa-paper-plane fa-fw"></span></button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Social Box -->
                                <ul class="social-box">
                                    <li><a href="https://www.twitter.com/"
                                           class="fa-brands fa-facebook-f fa-fw"></a></li>
                                    <li><a href="https://www.facebook.com/"
                                           class="fa-brands fa-twitter fa-fw"></a></li>
                                    <li><a href="https://dribbble.com/"
                                           class="fa-solid fa-dribbble fa-fw"></a></li>
                                    <li><a href="https://behance.com/"
                                           class="fa-solid fa-behance fa-fw"></a></li>
                                </ul>
                                <!-- End Social Box -->

                            </div>
                        </div>

                    </div>
                </div>

                <!-- Big Column -->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget contact-widget">
                                <h4>Official info:</h4>
                                <ul class="contact-list">
                                    <li><span class="icon fa fa-phone"></span> 30 Commercial Road <br>
                                        Fratton, Australia</li>
                                    <li><span class="icon fa fa-envelope"></span> 1-888-452-1505</li>
                                </ul>
                                <div class="timing">
                                    <strong>Open Hours: </strong>
                                    Mon - Sat: 8 am - 5 pm, <br> Sunday: CLOSED
                                </div>
                            </div>
                        </div>

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget instagram-widget">
                                <h4>Instagram</h4>
                                <div class="widget-content">
                                    <div class="assets/images-outer clearfix">
                                        <!--Image Box-->
                                        <figure class="image-box"><a class="lightbox-image"
                                                                     href="{{asset('assets/images/gallery/1.jpg')}}"><img
                                                    src="{{asset('assets/images/gallery/footer-gallery-thumb-1.jpg')}}"
                                                    alt=""></a></figure>
                                        <!--Image Box-->
                                        <figure class="image-box"><a class="lightbox-image"
                                                                     href="{{asset('assets/images/gallery/2.jpg')}}"><img
                                                    src="{{asset('assets/images/gallery/footer-gallery-thumb-2.jpg')}}"
                                                    alt=""></a></figure>
                                        <!--Image Box-->
                                        <figure class="image-box"><a class="lightbox-image"
                                                                     href="{{asset('assets/images/gallery/3.jpg')}}"><img
                                                    src="{{asset('assets/images/gallery/footer-gallery-thumb-3.jpg')}}"
                                                    alt=""></a></figure>
                                        <!--Image Box-->
                                        <figure class="image-box"><a class="lightbox-image"
                                                                     href="{{asset('assets/images/gallery/4.jpg')}}"><img
                                                    src="{{asset('assets/images/gallery/footer-gallery-thumb-4.jpg')}}"
                                                    alt=""></a></figure>
                                        <!--Image Box-->
                                        <figure class="image-box"><a class="lightbox-image"
                                                                     href="assets/images/gallery/5.jpg"><img
                                                    src="{{asset('assets/images/gallery/footer-gallery-thumb-5.jpg')}}"
                                                    alt=""></a></figure>
                                        <!--Image Box-->
                                        <figure class="image-box"><a class="lightbox-image"
                                                                     href="{{asset('assets/images/gallery/6.jpg')}}"><img
                                                    src="{{asset('images/gallery/footer-gallery-thumb-6.jpg')}}"
                                                    alt=""></a></figure>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="footer-bottom">
            <div class="copyright">2023 &copy; All rights reserved by <a href="#">CanvaSolutions</a>
            </div>
        </div>

    </div>
</footer>
<!-- Footer -->

<!-- Search Popup -->
<div class="search-popup">
    <div class="color-layer"></div>
    <button class="close-search"><span class="fas fa-times fa-fw"></span></button>
    <form method="post" action="https://html.themexriver.com/intime/intime/blog.html">
        <div class="form-group">
            <input type="search" name="search-field" value="" placeholder="Search Here"
                   required="">
            <button type="submit"><i class="flaticon-search"></i></button>
        </div>
    </form>
</div>
<!-- End Search Popup -->

</div>
<!-- End PageWrapper -->

</body>

<!-- Mirrored from html.themexriver.com/intime/intime/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Apr 2023 05:20:12 GMT -->

</html>
