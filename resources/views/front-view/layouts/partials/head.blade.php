<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>DIAMOND</title>
<meta name="description"
    content="Toko DIAMOND melayani jual beli emas dengan harga terpercaya, aman, dan transparan. Temukan perhiasan emas berkualitas serta layanan investasi emas yang menguntungkan di toko kami.">
<meta name="keywords"
    content="toko emas, jual emas, beli emas, harga emas, perhiasan emas, investasi emas, emas murni, DIAMOND">

<!-- Favicons -->
<link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
<link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect">
<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

<!-- Main CSS File -->
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
@stack('styles')

<style>
    #whatsapp-float {
        position: fixed;
        right: 15px;
        bottom: 70px;
        /* lebih tinggi dari scroll-top */
        width: 50px;
        height: 50px;
        background: #25d366;
        /* warna khas WA */
        color: #fff;
        border-radius: 50%;
        font-size: 22px;
        z-index: 999;
        transition: 0.3s;
    }

    #whatsapp-float:hover {
        background: #1ebe5d;
        color: #fff;
    }
</style>
