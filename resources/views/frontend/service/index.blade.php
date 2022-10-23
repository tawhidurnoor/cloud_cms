@extends('frontend.layouts.full.mainlayout')

@section('meta')
    <meta name="keywords" content="{{ getMetaKeywords() }}">
    <meta property="og:image" content="{{ URL::asset('uploads/images/' . getMetaImage()) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Services | {{ getMetaMetaTitle() }}" />
    <meta property="og:description" content="{{ getMetaDescription() }}" />
    <meta name="description" content="{{ getMetaDescription() }}">
@endsection

@section('styles')
@endsection

@section('title')
    <title>Services | {{ getMetaMetaTitle() }}</title>
@endsection

@section('body')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Services</h2>
                <ul>
                    <li>
                        <a href="{{ route('index') }}">
                            Home
                        </a>
                    </li>
                    <li class="active">Services</li>
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

    <section id="home-service-area" class="home-service-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span>Our Services and Solutions</span>
                <h2>What Do You Need? </h2>
                <p>We use an Iterative Agile Software & Web Development Process with Strategically Planned Development
                    Cycles that Adapt to Customer's Changing Needs. We Specialized in Manufacturing Customized Software
                    Solutions & Development service.
                </p>
            </div>
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-service">
                            <div class="service-img">
                                <img data-cfsrc="{{ asset('uploads/images/' . $service->icon) }}" alt="service"
                                    style="display:none;visibility:hidden;" /><noscript><img
                                        src="{{ asset('uploads/images/' . $service->icon) }}" alt="service" /></noscript>
                            </div>
                            <div class="service-content">
                                <h3>{{ $service->title }}
                                </h3>
                                <p>
                                    {!! Str::limit($service->short_description, 100) !!}
                                </p>
                                <a href="{{ route('slug.details', $service->slug) }}" class="line-bnt">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
