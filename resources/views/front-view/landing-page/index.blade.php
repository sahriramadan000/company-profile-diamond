@extends('front-view.layouts.app')

@push('styles')
    <style>
        .map-section {
            position: relative;
        }

        .map-overlay {
            position: absolute;
            top: 10px;
            left: 10px;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.9);
            padding: 8px 12px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            font-weight: bold;
            color: #333;
        }

        .map-overlay .bi-geo-alt-fill {
            margin-right: 8px;
            color: #d4af37;
            /* Gold color to match branding */
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 content-col" data-aos="fade-up">
                    <div class="content">
                        <div class="main-heading">
                            <h1>Gold And<br>Jewelry</h1>
                        </div>

                        <div class="divider"></div>

                        <div class="description">
                            <p>Temukan keindahan dan nilai investasi emas bersama DIAMOND. Kami menghadirkan koleksi
                                perhiasan emas berkualitas tinggi serta layanan jual beli emas yang aman dan transparan.
                                Dengan pengalaman dan kepercayaan pelanggan, kami memastikan setiap transaksi menjadi
                                pilihan cerdas untuk masa depan.</p>
                        </div>

                        <div class="cta-button">
                            <a href="#services" class="btn">
                                <span>Jelajahi Koleksi</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5" data-aos="zoom-out">
                    <div class="visual-content">
                        <div class="fluid-shape">
                            <img src="{{ asset('hero-img.png') }}" alt="Abstract Fluid Shape"
                                class="fluid-img rounded-circle">
                        </div>

                        <div class="stats-card">
                            <div class="stats-number">
                                <h2>5K+</h2>
                            </div>
                            <div class="stats-label">
                                <p>Transaksi Terpercaya</p>
                            </div>
                            <div class="stats-arrow">
                                <a href="#portfolio"><i class="bi bi-arrow-up-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->

    <section id="harga-emas" class="harga-emas section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Daftar Harga Emas Hari Ini</h2>
            <div>
                <span>Informasi harga terbaru</span>
                <br>
                <span id="goldInfo"></span>
            </div>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="200">
            <div class="table-responsive">
                <table
                    class="table table-bordered table-striped text-center align-middle rounded-3 overflow-hidden shadow-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>Berat</th>
                            <th>Harga Dasar</th>
                            <th>Harga (+Pajak PPh 0.25%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3" class="fw-bold text-start">Emas Batangan</td>
                        </tr>
                        @forelse ($goldPrices as $item)
                            <tr>
                                <td>{{ $item->weight }} gr</td>
                                <td>{{ number_format($item->base_price, 0, '.', '.') }}</td>
                                <td>{{ number_format($item->price_pph, 0, '.', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Data tidak tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="alert alert-info mt-3" role="alert">
                <h6 class="fw-bold text-black">Keterangan Penting:</h6>
                <ul class="mb-0">
                    @forelse ($importantNotes as $note)
                        <li>{{ $note->note }}</li>
                    @empty
                        <li>Data tidak tersedia</li>
                    @endforelse
                </ul>
            </div>

            <div class="text-center mt-3">
                <a href="https://wa.me/{{ $setting->no_wa ?? '0' }}" target="_blank"
                    class="btn btn-success btn-lg d-inline-flex align-items-center px-4 py-2 rounded-pill shadow">
                    <i class="bi bi-whatsapp me-2 fs-4"></i> Hubungi via WhatsApp
                </a>
            </div>
        </div>
    </section><!-- /Harga Emas Section -->

    <!-- About Section -->
    {{-- <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>About</h2>
            <div><span>Learn More</span> <span class="description-title">About Us</span></div>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gx-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                    <div class="about-image position-relative">
                        <img src="assets/img/about/about-portrait-1.webp" class="img-fluid rounded-4 shadow-sm"
                            alt="About Image" loading="lazy">
                        <div class="experience-badge">
                            <span class="years">20+</span>
                            <span class="text">Years of Expertise</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-left" data-aos-delay="300">
                    <div class="about-content">
                        <h2>Elevating Business Performance Through Innovation</h2>
                        <p class="lead">We focus on crafting bespoke strategies that navigate complexity and deliver
                            tangible results for our clients.</p>
                        <p>Through a blend of sophisticated analytics and creative problem-solving, we empower organizations
                            to thrive in rapidly evolving markets.</p>

                        <div class="row g-4 mt-3">
                            <div class="col-md-6" data-aos="zoom-in" data-aos-delay="400">
                                <div class="feature-item">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <h5>Dedicated Team Support</h5>
                                    <p>Our highly skilled professionals are committed to providing personalized service and
                                        impactful solutions on every engagement.</p>
                                </div>
                            </div>
                            <div class="col-md-6" data-aos="zoom-in" data-aos-delay="450">
                                <div class="feature-item">
                                    <i class="bi bi-lightbulb-fill"></i>
                                    <h5>Forward-Thinking Approach</h5>
                                    <p>We embrace innovative methodologies to develop unique strategies that drive lasting
                                        success.</p>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="btn btn-primary mt-4">Explore Our Services</a>
                    </div>
                </div>
            </div>

            <div class="testimonial-section mt-5 pt-5" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right" data-aos-delay="200">
                        <div class="testimonial-intro">
                            <h3>Our Clients Speak Highly</h3>
                            <p>Hear directly from those who have experienced the impact of our partnership and achieved
                                their strategic goals.</p>
                            <div class="swiper-nav-buttons mt-4">
                                <button class="slider-prev"><i class="bi bi-arrow-left"></i></button>
                                <button class="slider-next"><i class="bi bi-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8" data-aos="fade-left" data-aos-delay="300">
                        <div class="testimonial-slider swiper init-swiper">
                            <script type="application/json" class="swiper-config">
                {
                "loop": true,
                "speed": 800,
                "autoplay": {
                    "delay": 5000
                },
                "slidesPerView": 1,
                "spaceBetween": 30,
                "navigation": {
                    "nextEl": ".slider-next",
                    "prevEl": ".slider-prev"
                },
                "breakpoints": {
                    "768": {
                    "slidesPerView": 2
                    }
                }
                }
            </script>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="rating mb-3">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <p>"Their strategic vision and unwavering commitment to results provided exceptional
                                            value. Our operational efficiency has signficantly improved."</p>
                                        <div class="client-info d-flex align-items-center mt-4">
                                            <img src="assets/img/person/person-f-1.webp" class="client-img"
                                                alt="Client" loading="lazy">
                                            <div>
                                                <h6 class="mb-0">Eleanor Vance</h6>
                                                <span>Operations Manager</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="rating mb-3">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                        </div>
                                        <p>"Collaborating with their team was a revelation. Their innovative strategies
                                            guided us toward achieving our objectives with precision and speed."</p>
                                        <div class="client-info d-flex align-items-center mt-4">
                                            <img src="assets/img/person/person-m-1.webp" class="client-img"
                                                alt="Client" loading="lazy">
                                            <div>
                                                <h6 class="mb-0">David Kim</h6>
                                                <span>Product Lead</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="rating mb-3">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <p>"The depth of knowledge and unwavering dedication they bring to every project is
                                            exceptional. They've become an essential ally in driving our expansion."</p>
                                        <div class="client-info d-flex align-items-center mt-4">
                                            <img src="assets/img/person/person-f-2.webp" class="client-img"
                                                alt="Client" loading="lazy">
                                            <div>
                                                <h6 class="mb-0">Isabella Diaz</h6>
                                                <span>Research Analyst</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="rating mb-3">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                        </div>
                                        <p>"Their dedication to delivering superior solutions and their meticulous attention
                                            to detail have profoundly impacted our corporate growth trajectory."</p>
                                        <div class="client-info d-flex align-items-center mt-4">
                                            <img src="assets/img/person/person-f-3.webp" class="client-img"
                                                alt="Client" loading="lazy">
                                            <div>
                                                <h6 class="mb-0">Olivia Chen</h6>
                                                <span>Development Strategist</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section> --}}
    <!-- /About Section -->

    <!-- Services Section -->
    <section id="services" class="services section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Layanan</h2>
            <div><span>Cek</span> <span class="description-title">Layanan Kami</span></div>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="service-header">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-12">
                        <div class="service-intro">
                            <h2 class="service-heading">
                                <div>Layanan Terpercaya</div>
                                <div><span>untuk Investasi & Perhiasan Emas</span></div>
                            </h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="service-summary">
                            <p>
                                DIAMOND menghadirkan solusi terbaik dalam jual beli emas, perhiasan, serta investasi emas
                                murni. Dengan harga transparan, kualitas terjamin, dan pelayanan profesional, kami menjadi
                                mitra terpercaya untuk menjaga sekaligus menumbuhkan nilai aset Anda.
                            </p>
                            <a href="https://wa.me/{{ $setting->no_wa ?? '0' }}?text=Halo%2C%20saya%20ingin%20tahu%20lebih%20lanjut%20tentang%20layanan%20DIAMOND"
                                class="service-btn" target="_blank">
                                Hubungi via WhatsApp
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card position-relative z-1">
                        <div class="service-icon">
                            <i class="bi bi-cash-coin"></i>
                        </div>
                        <h3>
                            <a href="#!">
                                Jual & Beli <span>Emas</span>
                            </a>
                        </h3>
                        <p>
                            Kami menyediakan layanan jual dan beli emas dengan harga yang kompetitif dan transparan.
                            Setiap transaksi dijamin aman serta terpercaya.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card position-relative z-1">
                        <div class="service-icon">
                            <i class="bi bi-gem"></i>
                        </div>
                        <h3>
                            <a href="#!">
                                Perhiasan <span>Berkualitas</span>
                            </a>
                        </h3>
                        <p>
                            Temukan koleksi perhiasan emas eksklusif dengan desain elegan yang cocok untuk berbagai momen
                            berharga dan istimewa dalam hidup Anda.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card position-relative z-1">
                        <div class="service-icon">
                            <i class="bi bi-piggy-bank"></i>
                        </div>
                        <h3>
                            <a href="#!">
                                Investasi <span>Emas</span>
                            </a>
                        </h3>
                        <p>
                            Bangun masa depan yang lebih terjamin dengan investasi emas murni.
                            Kami membantu Anda memiliki aset yang nilainya terus bertumbuh.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card position-relative z-1">
                        <div class="service-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h3>
                            <a href="#!">
                                Garansi <span>Kualitas</span>
                            </a>
                        </h3>
                        <p>
                            Seluruh produk emas DIAMOND terjamin keaslian dan kemurniannya.
                            Setiap pembelian dilengkapi dengan sertifikat resmi.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card position-relative z-1">
                        <div class="service-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h3>
                            <a href="#!">
                                Konsultasi <span>Emas</span>
                            </a>
                        </h3>
                        <p>
                            Tim profesional kami siap memberikan konsultasi seputar emas dan perhiasan,
                            membantu Anda membuat keputusan terbaik.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card position-relative z-1">
                        <div class="service-icon">
                            <i class="bi bi-truck"></i>
                        </div>
                        <h3>
                            <a href="#!">
                                Layanan <span>Pengiriman</span>
                            </a>
                        </h3>
                        <p>
                            Nikmati kemudahan belanja emas dengan layanan pengiriman cepat dan aman langsung ke tangan Anda.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- /Services Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="advertise-1 d-flex flex-column flex-lg-row gap-4 align-items-center position-relative">

                <div class="content-left flex-grow-1" data-aos="fade-right" data-aos-delay="200">
                    <span class="badge text-uppercase mb-2">Jangan Lewatkan!</span>
                    <h2>Wujudkan Investasi & Gaya Elegan Bersama DIAMOND</h2>
                    <p class="my-4">
                        DIAMOND hadir dengan koleksi emas dan perhiasan eksklusif yang tidak hanya indah,
                        tetapi juga bernilai investasi jangka panjang. Ribuan pelanggan telah mempercayakan
                        aset berharga mereka bersama kami.
                    </p>

                    <div class="features d-flex flex-wrap gap-3 mb-4">
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Harga Transparan</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Emas Murni Bersertifikat</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Pelayanan Profesional</span>
                        </div>
                    </div>

                    <div class="cta-buttons d-flex flex-wrap gap-3">
                        <a href="https://wa.me/{{ $setting->no_wa ?? '0' }}?text=Halo%2C%20saya%20ingin%20tahu%20lebih%20lanjut%20tentang%20emas%20DIAMOND"
                            class="btn btn-primary" target="_blank">
                            Hubungi via WhatsApp
                        </a>
                        {{-- <a href="services.html" class="btn btn-outline">Lihat Koleksi</a> --}}
                    </div>
                </div>

                <div class="content-right position-relative" data-aos="fade-left" data-aos-delay="300">
                    <img src="{{ asset('gold.png') }}" alt="Koleksi Emas DIAMOND" class="img-fluid rounded-4">
                    <div class="floating-card">
                        <div class="card-icon">
                            <i class="bi bi-gem"></i>
                        </div>
                        <div class="card-content">
                            <span class="stats-number">5000+</span>
                            <span class="stats-text">Transaksi Terpercaya</span>
                        </div>
                    </div>
                </div>

                <div class="decoration">
                    <div class="circle-1"></div>
                    <div class="circle-2"></div>
                </div>

            </div>

        </div>

    </section><!-- /Call To Action Section -->

    <!-- Testimonials Section -->
    {{-- <section id="testimonials" class="testimonials section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Testimoni</h2>
            <div><span>Apa Kata</span> <span class="description-title">Pelanggan Kami</span></div>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="testimonials-slider swiper init-swiper">
                <script type="application/json" class="swiper-config">
            {
                "slidesPerView": 1,
                "loop": true,
                "speed": 600,
                "autoplay": {
                "delay": 5000
                },
                "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
                }
            }
            </script>

                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h2>Pelayanan Ramah & Profesional</h2>
                                    <p>
                                        Saya sangat puas berbelanja perhiasan di DIAMOND. Koleksinya elegan, harganya
                                        transparan,
                                        dan stafnya selalu memberikan penjelasan detail sehingga saya merasa aman.
                                    </p>
                                    <p>
                                        Benar-benar toko emas terpercaya untuk kebutuhan investasi maupun perhiasan
                                        sehari-hari.
                                    </p>
                                    <div class="profile d-flex align-items-center">
                                        <img src="assets/img/person/person-f-1.webp" class="profile-img" alt="">
                                        <div class="profile-info">
                                            <h3>Siti Nuraini</h3>
                                            <span>Ibu Rumah Tangga</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 d-none d-lg-block">
                                    <div class="featured-img-wrapper">
                                        <img src="assets/img/person/person-f-1.webp" class="featured-img" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Testimonial Item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h2>Kualitas Emas Terjamin</h2>
                                    <p>
                                        Saya membeli emas batangan di DIAMOND untuk tabungan masa depan. Prosesnya mudah,
                                        sertifikat jelas, dan harganya sesuai pasaran.
                                    </p>
                                    <p>
                                        Sangat direkomendasikan bagi siapa saja yang ingin investasi emas dengan aman.
                                    </p>
                                    <div class="profile d-flex align-items-center">
                                        <img src="assets/img/person/person-m-1.webp" class="profile-img" alt="">
                                        <div class="profile-info">
                                            <h3>Andi Pratama</h3>
                                            <span>Karyawan Swasta</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 d-none d-lg-block">
                                    <div class="featured-img-wrapper">
                                        <img src="assets/img/person/person-m-1.webp" class="featured-img" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Testimonial Item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h2>Desain Elegan & Modern</h2>
                                    <p>
                                        Perhiasan emas di DIAMOND benar-benar cantik dan modern. Saya membeli cincin untuk
                                        tunangan,
                                        hasilnya membuat pasangan saya sangat bahagia.
                                    </p>
                                    <p>
                                        Terima kasih DIAMOND, sudah membantu menjadikan momen berharga semakin istimewa.
                                    </p>
                                    <div class="profile d-flex align-items-center">
                                        <img src="assets/img/person/person-m-5.webp" class="profile-img" alt="">
                                        <div class="profile-info">
                                            <h3>Rizky Hidayat</h3>
                                            <span>Pengusaha</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 d-none d-lg-block">
                                    <div class="featured-img-wrapper">
                                        <img src="assets/img/person/person-m-5.webp" class="featured-img" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Testimonial Item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h2>Tempat Investasi Terpercaya</h2>
                                    <p>
                                        Saya rutin membeli emas di DIAMOND sebagai tabungan keluarga. Proses jual belinya
                                        mudah
                                        dan bisa dipercaya, membuat saya tenang menyimpan aset di sini.
                                    </p>
                                    <p>
                                        Layanan yang diberikan juga selalu memuaskan dan bersahabat.
                                    </p>
                                    <div class="profile d-flex align-items-center">
                                        <img src="assets/img/person/person-f-2.webp" class="profile-img" alt="">
                                        <div class="profile-info">
                                            <h3>Lestari Wulandari</h3>
                                            <span>Pegawai Negeri</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 d-none d-lg-block">
                                    <div class="featured-img-wrapper">
                                        <img src="assets/img/person/person-f-2.webp" class="featured-img" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Testimonial Item -->

                </div>

                <div class="swiper-navigation w-100 d-flex align-items-center justify-content-center">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

            </div>

        </div>

    </section><!-- /Testimonials Section --> --}}


    <!-- Portfolio Section -->
    {{-- <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <div><span>Check Our</span> <span class="description-title">Portfolio</span></div>
        </div><!-- End Section Title -->

        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="200">
                    <li data-filter="*" class="filter-active">
                        <i class="bi bi-grid-3x3"></i> All Projects
                    </li>
                    <li data-filter=".filter-ui">
                        <i class="bi bi-phone"></i> UI/UX
                    </li>
                    <li data-filter=".filter-development">
                        <i class="bi bi-code-slash"></i> Development
                    </li>
                    <li data-filter=".filter-photography">
                        <i class="bi bi-camera"></i> Photography
                    </li>
                    <li data-filter=".filter-marketing">
                        <i class="bi bi-graph-up"></i> Marketing
                    </li>
                </ul>

                <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="300">

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-ui">
                        <article class="portfolio-entry">
                            <figure class="entry-image">
                                <img src="assets/img/portfolio/portfolio-1.webp" class="img-fluid" alt=""
                                    loading="lazy">
                                <div class="entry-overlay">
                                    <div class="overlay-content">
                                        <div class="entry-meta">UI/UX Design</div>
                                        <h3 class="entry-title">Mobile Banking App</h3>
                                        <div class="entry-links">
                                            <a href="assets/img/portfolio/portfolio-1.webp" class="glightbox"
                                                data-gallery="portfolio-gallery-ui"
                                                data-glightbox="title: Mobile Banking App; description: Praesent commodo cursus magna, vel scelerisque nisl consectetur.">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                            </a>
                                            <a href="portfolio-details.html">
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-development">
                        <article class="portfolio-entry">
                            <figure class="entry-image">
                                <img src="assets/img/portfolio/portfolio-10.webp" class="img-fluid" alt=""
                                    loading="lazy">
                                <div class="entry-overlay">
                                    <div class="overlay-content">
                                        <div class="entry-meta">Development</div>
                                        <h3 class="entry-title">E-Learning Platform</h3>
                                        <div class="entry-links">
                                            <a href="assets/img/portfolio/portfolio-10.webp" class="glightbox"
                                                data-gallery="portfolio-gallery-development"
                                                data-glightbox="title: E-Learning Platform; description: Nulla vitae elit libero, a pharetra augue mollis interdum.">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                            </a>
                                            <a href="portfolio-details.html">
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-photography">
                        <article class="portfolio-entry">
                            <figure class="entry-image">
                                <img src="assets/img/portfolio/portfolio-7.webp" class="img-fluid" alt=""
                                    loading="lazy">
                                <div class="entry-overlay">
                                    <div class="overlay-content">
                                        <div class="entry-meta">Photography</div>
                                        <h3 class="entry-title">Urban Architecture</h3>
                                        <div class="entry-links">
                                            <a href="assets/img/portfolio/portfolio-7.webp" class="glightbox"
                                                data-gallery="portfolio-gallery-photography"
                                                data-glightbox="title: Urban Architecture; description: Sed ut perspiciatis unde omnis iste natus error sit voluptatem.">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                            </a>
                                            <a href="portfolio-details.html">
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-marketing">
                        <article class="portfolio-entry">
                            <figure class="entry-image">
                                <img src="assets/img/portfolio/portfolio-4.webp" class="img-fluid" alt=""
                                    loading="lazy">
                                <div class="entry-overlay">
                                    <div class="overlay-content">
                                        <div class="entry-meta">Marketing</div>
                                        <h3 class="entry-title">Social Media Campaign</h3>
                                        <div class="entry-links">
                                            <a href="assets/img/portfolio/portfolio-4.webp" class="glightbox"
                                                data-gallery="portfolio-gallery-marketing"
                                                data-glightbox="title: Social Media Campaign; description: Quis autem vel eum iure reprehenderit qui in ea voluptate.">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                            </a>
                                            <a href="portfolio-details.html">
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-ui">
                        <article class="portfolio-entry">
                            <figure class="entry-image">
                                <img src="assets/img/portfolio/portfolio-2.webp" class="img-fluid" alt=""
                                    loading="lazy">
                                <div class="entry-overlay">
                                    <div class="overlay-content">
                                        <div class="entry-meta">UI/UX Design</div>
                                        <h3 class="entry-title">Smart Home Interface</h3>
                                        <div class="entry-links">
                                            <a href="assets/img/portfolio/portfolio-2.webp" class="glightbox"
                                                data-gallery="portfolio-gallery-ui"
                                                data-glightbox="title: Smart Home Interface; description: At vero eos et accusamus et iusto odio dignissimos ducimus.">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                            </a>
                                            <a href="portfolio-details.html">
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-development">
                        <article class="portfolio-entry">
                            <figure class="entry-image">
                                <img src="assets/img/portfolio/portfolio-11.webp" class="img-fluid" alt=""
                                    loading="lazy">
                                <div class="entry-overlay">
                                    <div class="overlay-content">
                                        <div class="entry-meta">Development</div>
                                        <h3 class="entry-title">Cloud Management System</h3>
                                        <div class="entry-links">
                                            <a href="assets/img/portfolio/portfolio-11.webp" class="glightbox"
                                                data-gallery="portfolio-gallery-development"
                                                data-glightbox="title: Cloud Management System; description: Temporibus autem quibusdam et aut officiis debitis.">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                            </a>
                                            <a href="portfolio-details.html">
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-photography">
                        <article class="portfolio-entry">
                            <figure class="entry-image">
                                <img src="assets/img/portfolio/portfolio-8.webp" class="img-fluid" alt=""
                                    loading="lazy">
                                <div class="entry-overlay">
                                    <div class="overlay-content">
                                        <div class="entry-meta">Photography</div>
                                        <h3 class="entry-title">Nature Collection</h3>
                                        <div class="entry-links">
                                            <a href="assets/img/portfolio/portfolio-8.webp" class="glightbox"
                                                data-gallery="portfolio-gallery-photography"
                                                data-glightbox="title: Nature Collection; description: Integer posuere erat a ante venenatis dapibus posuere velit aliquet.">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                            </a>
                                            <a href="portfolio-details.html">
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-marketing">
                        <article class="portfolio-entry">
                            <figure class="entry-image">
                                <img src="assets/img/portfolio/portfolio-5.webp" class="img-fluid" alt=""
                                    loading="lazy">
                                <div class="entry-overlay">
                                    <div class="overlay-content">
                                        <div class="entry-meta">Marketing</div>
                                        <h3 class="entry-title">Brand Strategy</h3>
                                        <div class="entry-links">
                                            <a href="assets/img/portfolio/portfolio-5.webp" class="glightbox"
                                                data-gallery="portfolio-gallery-marketing"
                                                data-glightbox="title: Brand Strategy; description: Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum.">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                            </a>
                                            <a href="portfolio-details.html">
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div><!-- End Portfolio Item -->

                </div><!-- End Portfolio Container -->

            </div>

        </div>

    </section> --}}
    <!-- /Portfolio Section -->

    <!-- Faq Section -->
    <section class="faq-9 faq section" id="faq">

        <div class="container">
            <div class="row">

                <div class="col-lg-5" data-aos="fade-up">
                    <h2 class="faq-title">Punya pertanyaan? Cek FAQ kami</h2>
                    <p class="faq-description">Temukan jawaban atas pertanyaan umum seputar jual beli emas, perhiasan,
                        serta layanan investasi di Toko Emas DIAMOND.</p>
                    <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
                        <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
                    <div class="faq-container">

                        <div class="faq-item faq-active">
                            <h3>Apakah emas yang dijual di DIAMOND asli dan bersertifikat?</h3>
                            <div class="faq-content">
                                <p>Ya, semua emas dan perhiasan yang kami jual adalah asli, berkualitas tinggi,
                                    dan disertai sertifikat resmi untuk menjamin keaslian serta kadar emas.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Apakah bisa menjual kembali emas yang sudah dibeli di DIAMOND?</h3>
                            <div class="faq-content">
                                <p>Tentu, kami melayani buyback (jual kembali) emas dengan harga kompetitif sesuai harga
                                    pasar saat itu.
                                    Prosesnya cepat, mudah, dan transparan.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Apakah DIAMOND menyediakan emas batangan untuk investasi?</h3>
                            <div class="faq-content">
                                <p>Ya, kami menyediakan emas batangan dalam berbagai ukuran mulai dari 1 gram hingga 100
                                    gram,
                                    lengkap dengan sertifikat resmi, cocok untuk investasi jangka panjang.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Bagaimana cara mengetahui harga emas terbaru di DIAMOND?</h3>
                            <div class="faq-content">
                                <p>Harga emas kami selalu mengikuti perkembangan pasar dan diperbarui setiap hari.
                                    Anda dapat mengeceknya langsung di toko kami atau menghubungi WhatsApp customer service.
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Apakah DIAMOND menerima pembuatan perhiasan custom?</h3>
                            <div class="faq-content">
                                <p>Ya, kami melayani pembuatan perhiasan custom dengan desain sesuai permintaan Anda.
                                    Tim desainer kami siap membantu mewujudkan perhiasan impian Anda.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Apakah tersedia layanan cicilan untuk pembelian emas?</h3>
                            <div class="faq-content">
                                <p>Kami menyediakan opsi pembayaran fleksibel termasuk cicilan untuk beberapa jenis produk
                                    perhiasan.
                                    Syarat dan ketentuan berlaku, silakan hubungi staf kami untuk detail lebih lanjut.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /Faq Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <div><span>Let's</span> <span class="description-title">Connect</span></div>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- Contact Info Boxes -->
            <div class="row gy-4 mb-5">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info-box">
                        <div class="icon-box">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="info-content">
                            <h4>Our Address</h4>
                            <p>{{ $setting->address ?? '' }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-info-box">
                        <div class="icon-box">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <div class="info-content">
                            <h4>Whatsapp</h4>
                            @php
                                function formatPhone($number)
                                {
                                    $number = preg_replace('/\D/', '', $number);
                                    return preg_replace('/(\d{4})(\d{4})(\d+)/', '$1-$2-$3', $number);
                                }
                            @endphp
                            <p><a href="https://wa.me/{{ $setting->no_wa ?? '0' }}"
                                    target="_blank">{{ isset($setting->no_wa) ? formatPhone($setting->no_wa) : '' }}</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-info-box">
                        <div class="icon-box">
                            <i class="bi bi-clock"></i>
                        </div>
                        <div class="info-content">
                            <h4>Hours of Operation</h4>
                            <p>{{ $setting->hour_of_operation ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Google Maps (Full Width) -->
        <div class="map-section" data-aos="fade-up" data-aos-delay="200">
            <iframe src="{{ $setting->maps_link ?? '' }}" width="100%" height="500" style="border:0;"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <div class="map-overlay">
                <i class="bi bi-geo-alt-fill fs-2 text-warning"></i>
                <span>Toko Emas DIAMOND</span>
            </div>
        </div>
    </section>
    <!-- /Contact Section -->
@endsection

@push('scripts')
    <script>
        function setGoldUpdateTime() {
            // Format tanggal dalam bahasa Indonesia
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const today = new Date().toLocaleDateString('id-ID', {
                timeZone: 'Asia/Jakarta',
                ...options
            });

            // Teks sesuai kebutuhan
            document.getElementById("goldInfo").innerText =
                `${today}, update pukul 08.30 WIB`;
        }

        setGoldUpdateTime();
    </script>
    <script>
        // Tampilkan popup setelah halaman load
        window.addEventListener('load', function() {
            const popup = document.getElementById('popup-ad');
            const closeBtn = document.getElementById('popup-close');

            popup.style.display = 'flex';

            closeBtn.addEventListener('click', function() {
                popup.style.display = 'none';
            });

            // Klik di luar popup menutup iklan
            popup.addEventListener('click', function(e) {
                if (e.target === popup) {
                    popup.style.display = 'none';
                }
            });
        });
    </script>
@endpush
