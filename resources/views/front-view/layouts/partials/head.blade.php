<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>DIAMOND GOLD</title>
<meta name="description"
    content="Toko DIAMOND GOLD melayani jual beli emas dengan harga terpercaya, aman, dan transparan. Temukan perhiasan emas berkualitas serta layanan investasi emas yang menguntungkan di toko kami.">
<meta name="keywords"
    content="toko emas, jual emas, beli emas, harga emas, perhiasan emas, investasi emas, emas murni, DIAMOND GOLD, toko emas terpercaya, layanan jual beli emas">

<!-- Favicons -->
<link href="{{ asset('hero-img.png') }}" rel="icon">
<link href="{{ asset('hero-img.png') }}" rel="apple-touch-icon">

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

    /* Overlay gelap */
    .popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    /* Kotak iklan */
    .popup-box {
        background: #fff;
        padding: 0;
        max-width: 600px;
        width: 95%;
        border-radius: 15px;
        overflow: hidden;
        position: relative;
        text-align: center;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        animation: fadeIn 0.5s ease-in-out;
    }

    /* Gambar */
    .popup-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    /* Footer mirip card */
    .popup-footer {
        background: #f8f9fa;
        padding: 0;
        text-align: center;
        border-top: 1px solid #e0e0e0;
    }

    /* Tombol di footer */
    .popup-btn {
        width: 100%;
        display: inline-block;
        padding: 12px 20px;
        border-radius: 0 0 8px 8px;
        font-size: 1rem;
        font-weight: bold;
        background: #198754;
        color: #fff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
    }

    .popup-btn:hover {
        background: #146b42;
        color: #fff;
    }

    /* Tombol close */
    .popup-close {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 28px;
        cursor: pointer;
        color: #fff;
        background: rgba(0, 0, 0, 0.5);
        width: 35px;
        height: 35px;
        border-radius: 50%;
        line-height: 35px;
        text-align: center;
        font-weight: bold;
        z-index: 100;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>
