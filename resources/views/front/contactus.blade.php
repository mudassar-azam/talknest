@extends('layouts.front.main')
@section('content')
	<!-- Page Title -->
    <section class="page-title" style="background: linear-gradient(90deg, rgba(105,177,255,1) 21%, rgba(0,105,217,1) 71%, rgba(178,210,244,1) 94%);" >
        <div class="auto-container">
			<h2>Contact-Us</h2>
			<ul class="bread-crumb clearfix">
				<li><a href="{{('/')}}">Home</a></li>
				<li>contact-us</li>
			</ul>
        </div>
    </section>
    <style>
        .contact-header {
            margin-top: 20px;
        }
        .contact-content {
            margin-top: 20px;
        }
        .form-section {
            margin-top: 40px;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
				
	 <section class="container">
        <div class="row">
            <div id="primary" class="content-area col-lg-12">
                <main id="main" class="site-main">
                    <article id="post-76332" class="post-76332 page type-page status-publish hentry">
                     
                        <div class="entry-content contact-content">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>Submit Your Query in this form. We will reply to you as soon as possible.</h4>
                                    <div class="mt-3">
                                        <p style="text-align: center;">
                                            <span style="text-decoration: underline;">Copyright and Trademark reporting&nbsp;</span>
                                        </p>
                                        <p>
                                            If you believe a user is posting another entity’s copyrighted or trademarked material anywhere on the TalkNest website, 
                                            <!--please-->
                                            <!--<span style="color: #0000ff;">-->
                                            <!--    <strong><a style="color: #0000ff;" href="https://talknest.com/copyright-trademark-reporting/">click here.</a></strong>-->
                                            <!--</span>-->
                                        </p>
                                        <p style="text-align: center;">
                                            <span style="text-decoration: underline;">General Questions</span>
                                        </p>
                                        <p>
                                            If you have any general questions regarding the TalkNest website, please email 
                                            <a href="mailto:info@talknest.com">info@talknest.com</a>. We are happy to assist!
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 form-section">
                                     @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                
                                    <form id="contact-form" method="post" action="{{ route('contact.submit') }}" novalidate>
                                        @csrf
                                        <div class="form-group">
                                            <label for="your-name" class="form-label">Your name</label>
                                            <input type="text" id="your-name" name="your-name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="your-email" class="form-label">Your email</label>
                                            <input type="email" id="your-email" name="your-email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="your-subject" class="form-label">Subject</label>
                                            <input type="text" id="your-subject" name="your-subject" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="your-message" class="form-label">Your message (optional)</label>
                                            <textarea id="your-message" name="your-message" class="form-control" rows="5"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    <div id="form-response" class="mt-3"></div>

                                </div>
                            </div>
                            <div class="mt-4">
                                <p>
                                    At TalkNest, we strive to provide the best platform and experience for all our members. The TalkNest team is grateful for all the constructive feedback you provide. Please reach out to 
                                    <a href="mailto:info@talknest.com">info@talknest.com</a> if you believe there can be improvements. Thank you all so much!
                                </p>
                            </div>
                        </div><!-- .entry-content -->
                    </article>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .row -->
    </section><!-- .container -->
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   

@endsection
