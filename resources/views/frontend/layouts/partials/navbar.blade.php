<style>
    .nav-item {
        margin-right: 15px;
        margin-left: 15px;
    }
</style>

<style>
    .main-nav nav .navbar-nav .nav-item {
        padding: 0px 0px 0px 0px !important;
    }
</style>

<style>
    .navbar-area {
        box-shadow: 1px 6px 20px 1px rgba(0, 0, 0, 0.72);
        -webkit-box-shadow: 1px 6px 20px 1px rgba(0, 0, 0, 0.72);
        -moz-box-shadow: 1px 6px 20px 1px rgba(0, 0, 0, 0.72);
    }
</style>
<style>
    @media (max-width: 768px) {
        .logo_visibility {
            display: none;
        }
    }
</style>
<div class="navbar-area">
    <div class="mobile-nav">
        <a href="{{ route('index') }}" class="logo">
            <img data-cfsrc="{{ asset('uploads/images/' . getSettings('logo_dark')) }}" alt="logo"
                style="display:none;visibility:hidden;" />
            <noscript><img src="{{ asset('uploads/images/' . getSettings('logo_dark')) }}" alt="logo" /></noscript>
        </a>
    </div>
    <div class="main-nav">
        <div class="container d-flex justify-content-around">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav text-left">

                        <li class="nav-item">
                            <div class="logo">
                                <a href="{{ route('index') }}">
                                    <script type="text/javascript" style="display:none">
                                        //<![CDATA[
                                        window.__mirage2 = {
                                            petok: "ba344a321c135ff00f5b89431d43414a050761e9-1652165618-1800"
                                        };
                                        //]]>
                                    </script>

                                    <img class="logo_visibility"
                                        src="{{ asset('uploads/images/' . getSettings('logo_dark')) }}" alt="logo"
                                        style="display:none;visibility:hidden;" />

                                    <noscript><img src="{{ asset('uploads/images/' . getSettings('logo_dark')) }}"
                                            alt="logo" /></noscript>
                                </a>
                            </div>
                        </li>

                        @foreach (getHeader() as $header)
                            @isset($header['children'])
                                <li class="nav-item" style="padding-top: 20px !important;">
                                    <a href="{{ getBaseUrl() . $header['href'] }}"
                                        class="nav-link dropdown-toggle">{{ $header['text'] }}</a>
                                    <ul class="dropdown-menu">
                                        @foreach ($header['children'] as $header_children)
                                            <li class="nav-item">
                                                <a href="{{ getBaseUrl() . $header_children['href'] }}"
                                                    class="nav-link">{{ $header_children['text'] }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item" style="padding-top: 20px !important;">
                                    <a href="{{ getBaseUrl() . $header['href'] }}"
                                        class="nav-link">{{ $header['text'] }}</a>
                                </li>
                            @endisset
                        @endforeach

                        {{-- 
                        @foreach (getHeader() as $header)
                            @if (count(getSubMenu($header->id)) > 0)
                                <li class="nav-item" style="padding-top: 20px !important;">
                                    <a href="#" class="nav-link dropdown-toggle">{{ $header->text }}</a>
                                    <ul class="dropdown-menu">
                                        @foreach (getSubMenu($header->id) as $submenu)
                                            <li class="nav-item">
                                                <a href="{{ getBaseUrl() . $submenu->link }}"
                                                    class="nav-link">{{ $submenu->text }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item" style="padding-top: 20px !important;">
                                    <a href="{{ getBaseUrl() . $header->link }}"
                                        class="nav-link">{{ $header->text }}</a>
                                </li>
                            @endif
                        @endforeach --}}


                    </ul>
                </div>
                {{-- <div class="nav-btn">
                    <a href="{{ route('contact') }}" class="box-btn">Contact</a>
                </div> --}}
            </nav>
        </div>
    </div>
</div>
