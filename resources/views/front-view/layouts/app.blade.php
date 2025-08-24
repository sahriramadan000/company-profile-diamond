<!DOCTYPE html>
<html lang="en">

<head>
    @include('front-view.layouts.partials.head')
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div
            class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- <img src="assets/img/logo.webp" alt=""> -->
                <h1 class="sitename">DIAMOND</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#harga-emas">Harga Emas</a></li>
                    <li><a href="#services">Layanan</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="https://wa.me/628123456789" target="_blank">
                Hubungi via WhatsApp
            </a>
        </div>
    </header>


    <main class="main">
        @yield('content')
    </main>

    <footer id="footer" class="footer pb-0">
        <div class="copyright text-center mt-2">
            <p>© 2025 <span>Copyright</span> <strong class="px-1 sitename">Diamond</strong> <span>All Rights
                    Reserved</span></p>
        </div>
    </footer>

    <a href="https://wa.me/628123456789" target="_blank" id="whatsapp-float"
        class="d-flex align-items-center justify-content-center">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>


    @include('front-view.layouts.partials.foot')
</body>

</html>
