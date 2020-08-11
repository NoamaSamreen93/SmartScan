<!DOCTYPE HTML>

<html>
<head>
    <title>SmartScan</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>

<!-- Header -->
<div id="header">
    <a href="{{ url('/home') }}" class="logo"><strong>SmartScan</strong></a>

<!-- Nav -->
<nav>
    <div id="navbarSupportedContent">
            <!-- Authentication Links -->
            @guest
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
            @else
                    <a id="navbarDropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                        <a  href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form method="POST" id="logout-form" action="{{ route('logout') }}" style="display: none;">
                            @csrf
                        </form>
                @endguest
        </ul>
    </div>
</nav>
    </div>
<!-- Banner -->

<section id="banner">
    <div class="inner">
        <h1>SmartScan</h1>
        <h2> A Tool to detect DOS due to Unexpected Revert Vulnerability in Ethereum Smart Contracts </h2>
        <ul class="actions">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                <li><a href="{{ url('/saveSCUT') }}" class="button">Scan Smart Contracts</a></li>
        </ul>
    </div>
</section>
<!-- Two -->
{{--<article id="two" class="post invert style1 alt">
    <div class="image">
        <img src="images/pic13.jpg" alt="" data-position="10% center" />
    </div>
    <div class="content">
        <div class="inner">
            <header>
                <h2><a href="generic.html">Donec ex risus mollis</a></h2>
                <p class="info">3 days ago by <a href="#">Jane Doe</a></p>
            </header>
            <p>Nullam posuere erat vel placerat rutrum. Praesent ac consectetur dui, et congue quam. Donec aliquam lacinia condimentum. Integer porta massa sapien, commodo sodales diam suscipit vitae. Aliquam quis felis sed urna semper semper. Phasellus eu scelerisque mi. Vivamus aliquam nisl libero, sit amet scelerisque ligula laoreet vel.</p>
            <ul class="actions">
                <li><a href="generic.html" class="button alt">Read More</a></li>
            </ul>
        </div>
        <div class="postnav">
            <a href="#one" class="scrolly prev"><span class="icon fa-chevron-up"></span></a>
            <a href="#three" class="scrolly next"><span class="icon fa-chevron-down"></span></a>
        </div>
    </div>
</article>--}}

<!-- Three -->
{{--
<article id="three" class="post style2">
    <div class="image">
        <img src="images/pic12.jpg" alt="" data-position="80% center" />
    </div>
    <div class="content">
        <div class="inner">
            <header>
                <h2><a href="generic.html">Sed tempus interdum</a></h2>
                <p class="info">3 days ago by <a href="#">Jane Doe</a></p>
            </header>
            <p>Nullam posuere erat vel placerat rutrum. Praesent ac consectetur dui, et congue quam. Donec aliquam lacinia condimentum. Integer porta massa sapien, commodo sodales diam suscipit vitae. Aliquam quis felis sed urna semper semper. Phasellus eu scelerisque mi. Vivamus aliquam nisl libero, sit amet scelerisque ligula laoreet vel.</p>
            <ul class="actions">
                <li><a href="generic.html" class="button alt">Read More</a></li>
            </ul>
        </div>
        <div class="postnav">
            <a href="#two" class="scrolly prev"><span class="icon fa-chevron-up"></span></a>
            <a href="#four" class="scrolly next"><span class="icon fa-chevron-down"></span></a>
        </div>
    </div>
</article>
--}}

<!-- Four -->
{{--<article id="four" class="post invert style2 alt">
    <div class="image">
        <img src="images/pic14.jpg" alt="" data-position="60% center" />
    </div>
    <div class="content">
        <div class="inner">
            <header>
                <h2><a href="generic.html">Adipiscing sed urna</a></h2>
                <p class="info">3 days ago by <a href="#">Jane Doe</a></p>
            </header>
            <p>Nullam posuere erat vel placerat rutrum. Praesent ac consectetur dui, et congue quam. Donec aliquam lacinia condimentum. Integer porta massa sapien, commodo sodales diam suscipit vitae. Aliquam quis felis sed urna semper semper. Phasellus eu scelerisque mi. Vivamus aliquam nisl libero, sit amet scelerisque ligula laoreet vel.</p>
            <ul class="actions">
                <li><a href="generic.html" class="button alt">Read More</a></li>
            </ul>
        </div>
        <div class="postnav">
            <a href="#three" class="scrolly prev"><span class="icon fa-chevron-up"></span></a>
            <a href="#five" class="scrolly next"><span class="icon fa-chevron-down"></span></a>
        </div>
    </div>
</article>--}}

<!-- Five -->
{{--<article id="five" class="post style3">
    <div class="image">
        <img src="images/pic13.jpg" alt="" data-position="5% center" />
    </div>
    <div class="content">
        <div class="inner">
            <header>
                <h2><a href="generic.html">Interdum et rutrum</a></h2>
                <p class="info">3 days ago by <a href="#">Jane Doe</a></p>
            </header>
            <p>Nullam posuere erat vel placerat rutrum. Praesent ac consectetur dui, et congue quam. Donec aliquam lacinia condimentum. Integer porta massa sapien, commodo sodales diam suscipit vitae. Aliquam quis felis sed urna semper semper. Phasellus eu scelerisque mi. Vivamus aliquam nisl libero, sit amet scelerisque ligula laoreet vel.</p>
            <ul class="actions">
                <li><a href="generic.html" class="button alt">Read More</a></li>
            </ul>
        </div>
        <div class="postnav">
            <a href="#four" class="scrolly prev"><span class="icon fa-chevron-up"></span></a>
            <a href="#six" class="scrolly next"><span class="icon fa-chevron-down"></span></a>
        </div>
    </div>
</article>--}}

<!-- Six -->
{{--<article id="six" class="post invert style3 alt">
    <div class="image">
        <img src="images/pic12.jpg" alt="" data-position="80% center" />
    </div>
    <div class="content">
        <div class="inner">
            <header>
                <h2><a href="generic.html">Magna porta aliquam</a></h2>
                <p class="info">3 days ago by <a href="#">Jane Doe</a></p>
            </header>
            <p>Nullam posuere erat vel placerat rutrum. Praesent ac consectetur dui, et congue quam. Donec aliquam lacinia condimentum. Integer porta massa sapien, commodo sodales diam suscipit vitae. Aliquam quis felis sed urna semper semper. Phasellus eu scelerisque mi. Vivamus aliquam nisl libero, sit amet scelerisque ligula laoreet vel.</p>
            <ul class="actions">
                <li><a href="generic.html" class="button alt">Read More</a></li>
            </ul>
        </div>
        <div class="postnav">
            <a href="#five" class="scrolly prev"><span class="icon fa-chevron-up"></span></a>
            <a href="#" class="scrolly next disabled"><span class="icon fa-chevron-down"></span></a>
        </div>
    </div>
</article>--}}

<!-- Footer -->
<footer id="footer">
    <ul class="icons">
        <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
    </ul>
    {{--<div class="copyright">
        &copy; Untitled. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a href="https://unsplash.com">Unsplash</a>.
    </div>--}}
</footer>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>