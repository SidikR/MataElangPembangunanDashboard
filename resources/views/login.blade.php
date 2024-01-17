<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Primary Meta Tags -->
    <Title>Satu Data Lampung Selatan</Title>
    <meta name="title" content="Satu Data Lampung Selatan">
    <meta name="robots" content="index, follow">
    <meta name="author" content="{{ $meta['author'] ?? 'PT Erlangga Nusantara Ekspor' }}">
    <meta name="description" content="{{ $meta['description'] ?? 'default description' }}">
    <meta name="keywords" content="{{ $meta['keywords'] ?? 'default keyword' }}">
    <meta name="revisit-after" content="3 days">
    <meta name="language" content="en">
    <meta name="generator" content="Laravel">
    <meta name="copyright" content="Hak Cipta © 2023 PT. Erlangga Nusantara Ekspor">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://metatags.io/" />
    <meta property="og:title" content="Meta Tags — Preview, Edit and Generate" />
    <meta property="og:description"
        content="With Meta Tags you can edit and experiment with your content then preview how your webpage will look on Google, Facebook, Twitter and more!" />
    <meta property="og:image" content="https://metatags.io/images/meta-tags.png" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://metatags.io/" />
    <meta property="twitter:title" content="Meta Tags — Preview, Edit and Generate" />
    <meta property="twitter:description"
        content="With Meta Tags you can edit and experiment with your content then preview how your webpage will look on Google, Facebook, Twitter and more!" />
    <meta property="twitter:image" content="https://metatags.io/images/meta-tags.png" />

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/login/img/lamsel.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600&display=swap"
        rel="stylesheet">


    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/login/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/login/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/login/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/login/vendor/aos/aos.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/login/leaflet-easyprint/dist/bundle.js') }}"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet-sidebar-v2/css/leaflet-sidebar.css" />
    <script src="https://unpkg.com/leaflet-sidebar-v2/js/leaflet-sidebar.js"></script>

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/login/css/main.css') }}" rel="stylesheet">

</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

    <main id="main" class="m-0 p-0 rounded-0 ">

        <section id="hero" class="hero m-0 p-0">
            <div class="container p-5 h-25 w-50">
                <div class="row w-100 h-100 p-5 rounded-3 shadow-lg"
                    style="backdrop-filter: blur(10px); box-shadow: 30px">
                    <div class="heading p-3 mb-2 d-flex flex-column justify-content-center align-items-center ">
                        <h2>Login</h2>
                        <span>Silakan login terlebih dahulu</span>

                        @if ($errors->any())
                            <div class="alert alert-danger m-3 p-3">
                                <p class="fs-5 fw-bold text-danger text-center mb-2">Login Gagal</p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <form action="{{ route('login.send') }}" method="post"
                        class="text-black opacity-100 d-flex flex-column gap-3">
                        @method('POST')
                        @csrf

                        <div class="form-floating">
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                                placeholder="name@example.com" value="{{ old('email') }}">
                            <label for="floatingInput">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-group">
                            <div class="form-floating">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="floatingPassword"
                                    placeholder="Password" value="{{ old('password') }}">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <span
                                class="input-group-text text-center d-flex align-items-center justify-content-center pb-4 pe-3"
                                style="width: 40px; height: 58px">
                                <i class="bi bi-eye fs-5" id="togglePassword"></i>
                            </span>
                        </div>

                        <div class="d-flex justify-content-end fs-6 fw-bold" style="font-size: 30px">
                            <button type="submit" class="btn btn-success p-2 px-3 fs-5 fw-bold ">
                                Login
                            </button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="hero-bg-slider">
                <img src="assets/login/img/hero/hero1.jpg" alt="" data-aos="fade-in">
                <img src="assets/login/img/hero/hero2.jpg" alt="" data-aos="fade-in">
                <img src="assets/login/img/hero/hero3.jpeg" alt="" data-aos="fade-in">
            </div>

        </section><!-- End Hero Section -->

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Change background image every 5 seconds
                let index = 0;
                const images = document.querySelectorAll('.hero-bg-slider img');

                function changeImage() {
                    images.forEach(img => img.style.opacity = 0);
                    images[index].style.opacity = 1;
                    index = (index + 1) % images.length;
                }

                setInterval(changeImage, 3000);
            });

            document.getElementById('togglePassword').addEventListener('click', function() {
                var passwordInput = document.getElementById('floatingPassword');
                var eyeIcon = document.getElementById('togglePassword');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIcon.classList.add('bi-eye-slash');
                    eyeIcon.classList.remove('bi-eye');
                } else {
                    passwordInput.type = 'password';
                    eyeIcon.classList.remove('bi-eye-slash');
                    eyeIcon.classList.add('bi-eye');
                }
            });
        </script>


    </main>


    <!-- Scroll Top Button -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/login/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/login/vendor/leaflet-easyprint/dist/bundle.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/login/js/main.js') }}"></script>

</body>

</html>
