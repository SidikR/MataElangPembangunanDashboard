<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    {{-- <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable-jquery.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
    <script src="{{ asset('utils/calculateDaysAgo.js') }}"></script>
    <script src="{{ asset('global.js') }}"></script>

</head>

<body>
    <div id="app">

        @include('partials.sidebar')

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>{{ $data['header_name'] ?? 'Dashboard' }}</h3>
            </div>

            <div class="page-content">
                @yield('content')
            </div>

            @include('partials.footer')

        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Need: Apexcharts -->
    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
    {{-- <script src="{{ asset('assets/static/js/components/dark.js') }}"></script> --}}
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/compiled/js/app.js') }}"></script> --}}
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/datatables.js') }}"></script>

    <script defer>
        window.onload = function() {
            console.log('JavaScript code executed');

            @if (session('success'))
                var successMessage = "{{ session('success') }}";

                Toastify({
                    text: successMessage,
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    close: true,
                    stopOnFocus: true,
                }).showToast();
            @endif

            @if (session('error'))
                var errorMessage = "{{ session('error') }}";

                Toastify({
                    text: errorMessage,
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    close: true,
                    stopOnFocus: true,
                    backgroundColor: "red",
                }).showToast();
            @endif
        }
    </script>


</body>

</html>
