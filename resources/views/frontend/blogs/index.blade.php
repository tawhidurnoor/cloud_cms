@extends('frontend.layouts.full.mainlayout')

@section('meta')
    <meta name="keywords" content="{{ getMetaKeywords() }}">
    <meta property="og:image" content="{{ URL::asset('uploads/images/' . getMetaImage()) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Blogs | {{ getSettings('website_name') }}" />
    <meta property="og:description" content="{{ getMetaDescription() }}" />
    <meta name="description" content="{{ getMetaDescription() }}">
@endsection

@section('styles')
@endsection

@section('title')
    <title>Blogs | Code CLoud Technology</title>
@endsection

@section('body')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Blog</h2>
                <ul>
                    <li>
                        <a href="{{ route('index') }}">
                            Home
                        </a>
                    </li>
                    <li class="active">Blog</li>
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

    <section class="home-blog-area ptb-100">
        <div class="container">
            <div class="section-title">
                <span>Blog Post</span>
                <h2>Read Our Blogs</h2>
            </div>
            <div class="row">

                @if (count($blogs) == 0)
                    <div class="alert alert-warning" role="alert">
                        We don't have anything for you to read right now.
                    </div>
                @else
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="{{ route('blog.details', $blog->slug) }}">
                                        <img data-cfsrc="{{ asset('uploads/images/' . $blog->banner) }}" alt="blog"
                                            style="display:none;visibility:hidden;">
                                        <noscript>
                                            <img src="{{ asset('uploads/images/' . $blog->banner) }}" width="570px"
                                                alt="blog">
                                        </noscript>
                                    </a>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>
                                            {{ \Carbon\Carbon::parse($blog->updated_at)->diffForHumans() }}
                                        </li>
                                        <li>
                                            <a href="#">By Admin</a>
                                        </li>
                                    </ul>
                                    <a href="{{ route('blog.details', $blog->slug) }}">
                                        <h3>{{ $blog->title }}</h3>
                                    </a>
                                    <p>
                                        {!! Str::limit($blog->summary, 100) !!}
                                    </p>
                                    <a href="{{ route('blog.details', $blog->slug) }}" class="line-bnt">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                {{-- <div class="col-lg-12">
                    <div class="page-navigation-area">
                        <nav aria-label="Page navigation example text-center">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link page-links" href="#">
                                        <i class='bx bx-chevrons-left'></i>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class='bx bx-chevrons-right'></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
