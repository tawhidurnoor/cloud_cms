@extends('frontend.layouts.full.mainlayout')

@section('meta')
    <meta name="keywords" content="{{ $service->keywords }}">
    <meta property="og:image" content="{{ URL::asset('uploads/images/' . getMetaImage()) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $service->meta_title }} | {{ getSettings('website_name') }}" />
    <meta property="og:description" content="{{ $service->meta_description }}" />
    <meta name="description" content="{{ $service->meta_description }}">
@endsection

@section('styles')
    <style>
        .main-div {
            background-color: {!! $service->div_color !!};
            border-radius: 50px;
            margin-top: 20px;
            margin-bottom: 30px;
            padding: 30px;
        }
    </style>

    <style>
        .single-div {
            background-color: #fff;
            -webkit-box-shadow: 0 0 20px 3px rgb(0 0 0 / 5%);
            box-shadow: 0 0 20px 3px rgb(0 0 0 / 5%);
            padding: 80px;
            border-radius: 4px;
            margin-bottom: 30px;
            border-radius: 50px 50px 50px 50px;
            -webkit-transition: all .5s;
            transition: all .5s;
        }
    </style>

    <style>
        blockquote {
            background: #f9f9f9;
            border-left: 10px solid #ccc;
            margin: 1.5em 10px;
            padding: 0.5em 10px;
            quotes: "\201C""\201D""\2018""\2019";
        }

        blockquote:before {
            color: #ccc;
            content: open-quote;
            font-size: 4em;
            line-height: 0.1em;
            margin-right: 0.25em;
            vertical-align: -0.4em;
        }

        blockquote p {
            display: inline;
        }
    </style>

    <style>
        ul {
            list-style-type: circle;
        }

        ul li::before {
            content: "\200B";
        }
    </style>
@endsection

@section('title')
    <title>{{ $service->title }} | {{ getSettings('website_name') }}</title>
@endsection

@section('body')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>{{ $service->title }}</h2>
                <ul>
                    <li>
                        <a href="{{ route('index') }}">
                            Home
                        </a>
                    </li>
                    <li>Services</li>
                    <li class="active">{{ $service->title }}</li>
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


    {{-- <section class="services-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="services-details-text">
                        {!! $service->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="container main-div">
        <section class="home-company-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="company-content">
                            <div class="company-tittle">
                                {!! $service->description !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="">
                            <img data-cfsrc="{{ asset('uploads/images/' . $service->right_banner) }}" alt="company"
                                style="display:none;visibility:hidden;" /><noscript><img
                                    src="{{ asset('uploads/images/' . $service->right_banner) }}"
                                    alt="company" /></noscript>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row">
                @if ($service->is_bottom_div_1 == 1)
                    <div class="{{ $service->is_bottom_div_2 == 0 ? 'col-lg-12' : 'col-lg-6' }} col-sm-12">
                        <div class="single-div">
                            {!! $service->bottom_div_1 !!}
                            <br>
                            @if ($service->is_bottom_div_button_1 == 1)
                                <a class="box-btn" href="{{ $service->bottom_div_button_1_link }}" target="_blank">
                                    {{ $service->bottom_div_button_1_text }}
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
                @if ($service->is_bottom_div_2 == 1)
                    <div class="{{ $service->is_bottom_div_1 == 0 ? 'col-lg-12' : 'col-lg-6' }} col-sm-12">
                        <div class="single-div">
                            {!! $service->bottom_div_2 !!}
                            <br>
                            @if ($service->is_bottom_div_button_2 == 1)
                                <a class="box-btn" href="{{ $service->bottom_div_button_2_link }}" target="_blank">
                                    {{ $service->bottom_div_button_2_text }}
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
