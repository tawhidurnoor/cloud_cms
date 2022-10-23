@extends('frontend.layouts.full.mainlayout')

@section('meta')
    <meta name="keywords" content="{{ getMetaKeywords() }}">
    <meta property="og:image" content="{{ URL::asset('uploads/images/' . getMetaImage()) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Contact | {{ getSettings('website_name') }}" />
    <meta property="og:description" content="{{ getMetaDescription() }}" />
    <meta name="description" content="{{ getMetaDescription() }}">
@endsection

@section('styles')
@endsection

@section('title')
    <title>Contact | {{ getSettings('website_name') }}</title>
@endsection

@section('body')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Contact</h2>
                <ul>
                    <li>
                        <a href="{{ route('index') }}">
                            Home
                        </a>
                    </li>
                    <li class="active">Contact</li>
                </ul>
            </div>
        </div>
        <div class="page-shape">
            <div class="shape1">
                <img data-cfsrc="{{ asset('assets_frontend/images/shape/1.png') }}" alt="shape"
                    style="display:none;visibility:hidden;" /><noscript><img
                        src="{{ asset('assets_frontend/images/shape/1.png') }}" alt="shape" /></noscript>
            </div>
            <div class="shape3">
                <img data-cfsrc="{{ asset('assets_frontend/images/shape/3.png') }}" alt="shape"
                    style="display:none;visibility:hidden;" /><noscript><img
                        src="{{ asset('assets_frontend/images/shape/3.png') }}" alt="shape" /></noscript>
            </div>
            <div class="shape4">
                <img data-cfsrc="{{ asset('assets_frontend/images/shape/4.png') }}" alt="shape"
                    style="display:none;visibility:hidden;" /><noscript><img
                        src="{{ asset('assets_frontend/images/shape/4.png') }}" alt="shape" /></noscript>
            </div>
            <div class="shape5">
                <img data-cfsrc="{{ asset('assets_frontend/images/shape/5.png') }}" alt="shape"
                    style="display:none;visibility:hidden;" /><noscript><img
                        src="{{ asset('assets_frontend/images/shape/5.png') }}" alt="shape" /></noscript>
            </div>
            <div class="shape6">
                <img data-cfsrc="{{ asset('assets_frontend/images/shape/6.png') }}" alt="shape"
                    style="display:none;visibility:hidden;" /><noscript><img
                        src="{{ asset('assets_frontend/images/shape/6.png') }}" alt="shape" /></noscript>
            </div>
        </div>
    </div>


    <section class="contact-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="single-contact">
                        <div class="icon">
                            <i class='bx bx-time'></i>
                        </div>
                        <div class="content">
                            <h3>Opening Hours</h3>
                            <p>Sat - Thu : 09:00 AM - 05:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single-contact">
                        <div class="icon">
                            <i class='bx bx-location-plus'></i>
                        </div>
                        <div class="content">
                            <h3>Address</h3>
                            <p>{{ getSettings('address') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="single-contact">
                        <div class="icon">
                            <i class='bx bx-phone-call'></i>
                        </div>
                        <div class="content">
                            <h3>Phone</h3>
                            <p>{{ getSettings('phone') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="home-contact-area home-2-contact pb-100">
        <div class="container">
            <div class="section-title">
                <span>Contact Us</span>
                <h2>Let Us Know About Your Project Idea!</h2>
                {{-- <p>It is a long established fact that a reader will be distracted by the rea dable content of a page
                    when looking at its layout. The point of using Lorem Ipsum is that it has a more.</p> --}}
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="content">
                        @isset($saved)
                            <h2>Thanks you! We got your message!</h2>
                        @else
                            <form id="contactForm" method="GET" action="{{ route('contact') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" required
                                                data-error="Please enter your name" placeholder="Your Name" />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" required
                                                data-error="Please enter your email" placeholder="Your Email" />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="phone" id="phone" required
                                                data-error="Please enter your number" class="form-control"
                                                placeholder="Your Phone" />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="subject" id="subject" class="form-control"
                                                required data-error="Please enter your subject" placeholder="Subject" />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="5" required
                                                data-error="Write your message" placeholder="Your Message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn page-btn box-btn">
                                            Submit
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        @endisset
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact-img contact-img-2">
                        <img data-cfsrc="assets/images/contact-img2.jpg" alt="contact"
                            style="display:none;visibility:hidden;" /><noscript><img src="assets/images/contact-img2.jpg"
                                alt="contact" /></noscript>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
