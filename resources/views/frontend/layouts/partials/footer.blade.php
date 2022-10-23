{{-- <footer class="footer-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="content">
                    <div class="logo">
                        <a href="{{ route('index') }}"><img
                                data-cfsrc="{{ asset('uploads/images/' . getSettings('logo_light')) }}" alt="logo"
                                style="display:none;visibility:hidden;" /><noscript><img
                                    src="{{ asset('uploads/images/' . getSettings('logo_light')) }}"
                                    alt="logo" /></noscript></a>
                    </div>
                    <br>
                    <div class="subscribe">
                        <h4>Join Newsletter</h4>
                        <form class="newsletter-form" data-toggle="validator">
                            <input type="email" id="emails" class="form-control" placeholder="Your Email"
                                name="EMAIL" required autocomplete="off">
                            <button class="box-btn" type="submit">
                                Subscribe
                            </button>
                            <div id="validator-newsletter" class="form-result"></div>
                        </form>
                    </div>
                    <ul class="social">
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-pinterest'></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="content ml-15">
                    <h3>Our Service</h3>
                    <ul class="footer-list">
                        @foreach (getServices()->take(3) as $service)
                            <li><a href="{{ route('slug.details', $service->slug) }}">{{ $service->title }}</a></li>
                        @endforeach
                        <li><a href="{{ route('service.index') }}">More Services</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="content">
                    <h3>Quick Links</h3>
                    <ul class="footer-list">
                        <li><a href="/privacy-policy">Privacy & Policy</a></li>
                        <li><a href="/terms-conditions">Terms & Conditions</a></li>
                        <li><a href="/copyright-policy">Copyright Policy</a></li>
                        <li><a href="/contact">Help Center</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="content contacts">
                    <h3 class="ml-40">Contact</h3>
                    <ul class="footer-list foot-social">
                        <li>
                            <a href="tel:{{ getSettings('phone') }}">
                                <i class="bx bx-phone"></i> {{ getSettings('phone') }}
                            </a>
                        </li>
                        <li>
                            <a href="mailto:{{ getSettings('email') }}">
                                <i class="bx bxs-envelope"></i>
                                <span class="__cf_email__">{{ getSettings('email') }}</span>
                            </a>
                        </li>
                        <li>
                            <i class="bx bxs-map"></i> {{ getSettings('address') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-area" style="margin-top: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <p>
                            Copyright @ 2012-2022 CodeCloud Technology Ltd.
                        </p>
                    </center>
                </div>
            </div>
        </div>
    </div>
</footer> --}}
<style type="text/css">
    {!! getFooter()->css !!}
</style>
{!! getFooter()->html !!}

<div class="go-top">
    <i class='bx bx-chevrons-up'></i>
    <i class='bx bx-chevrons-up'></i>
</div>
