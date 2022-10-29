@extends('frontend.layouts.full.mainlayout')

@section('meta')
    <meta name="keywords" content="{{ $page->keywords }}">
    <meta property="og:image" content="{{ URL::asset('uploads/images/' . getMetaImage()) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $page->meta_title }} | {{ getSettings('website_name') }}" />
    <meta property="og:description" content="{{ $page->meta_description }}" />
    <meta name="description" content="{{ $page->meta_description }}">
@endsection

@section('styles')
    <style type="text/css">
        {!! $page->css !!}
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
    <title>{{ $page->title }} | {{ getSettings('website_name') }}</title>
@endsection

@section('body')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>{{ $page->title }}</h2>
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



    {{-- @if (request()->segment(1) == 'softwares' || request()->segment(1) == 'hrms-software' || request()->segment(1) == 'pos-software')
        <section class="container">
            {!! $page->html !!}
        </section>
    @else
    <section class="services-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </section>
    @endif --}}

    <section class="services-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </section>
@endsection
