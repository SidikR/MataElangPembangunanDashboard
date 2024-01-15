<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
    <script src="{{ asset('utils/calculateDaysAgo.js') }}"></script>
    <script src="{{ asset('global.js') }}"></script>

</head>

<body style="overflow: hidden">
    <div id="app" class="app-wrapper wkwk">
        <div class="d-flex flex-column row">

            @include('partials.header')

            <div class="col">
                <div class="main row z-0">

                    @include('partials.sidebar')

                    <div id="main" class="col m-2 me-4" style="overflow-x: auto; height: 90vh; width: auto">

                        <div class="page-heading">
                            <h3>{{ $data['header_name'] ?? 'Dashboard' }}</h3>
                        </div>

                        <div class="page-content">
                            @yield('content')
                        </div>

                        @include('partials.footer')

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const iconToggle = document.getElementById('iconToggle');
            const toggleBtn = document.getElementById('toggle-btn');
            const toggleBtnAside = document.getElementById('iconToggledAside');
            var isSidebarOpen = true;

            sidebarToggle.addEventListener('click', function() {
                if (isSidebarOpen) {
                    sidebar.style.display = 'none';
                    iconToggle.classList.add('bi-list', 'fs-5', 'fw-bold');
                    iconToggle.classList.remove('bi-x', 'fs-5', 'fw-bold');
                    toggleBtnAside.classList.add('bi-caret-right');
                    toggleBtnAside.classList.remove('bi-caret-left');
                    toggleBtn.style.position = 'fixed';
                    toggleBtn.style.top = '50%';
                    toggleBtn.style.left = '0px';
                } else {
                    sidebar.style.display = 'block';
                    iconToggle.classList.remove('bi-list', 'fs-5', 'fw-bold');
                    iconToggle.classList.add('bi-x', 'fs-5', 'fw-bold');
                    toggleBtnAside.classList.remove('bi-caret-right');
                    toggleBtnAside.classList.add('bi-caret-left');
                }

                isSidebarOpen = !isSidebarOpen;
                if (isSidebarOpen) {
                    toggleBtn.style.removeProperty('position');
                    toggleBtn.style.removeProperty('top');
                    toggleBtn.style.removeProperty('left');
                }
            });

            toggleBtn.addEventListener('click', function() {
                if (isSidebarOpen) {
                    sidebar.style.display = 'none';
                    iconToggle.classList.add('bi-list', 'fs-5', 'fw-bold');
                    iconToggle.classList.remove('bi-x', 'fs-5', 'fw-bold');
                    toggleBtn.style.position = 'fixed';
                    toggleBtn.style.top = '50%';
                    toggleBtn.style.left = '0px';
                    toggleBtnAside.classList.add('bi-caret-right');
                    toggleBtnAside.classList.remove('bi-caret-left');
                } else {
                    sidebar.style.display = 'block';
                    iconToggle.classList.remove('bi-list', 'fs-5', 'fw-bold');
                    iconToggle.classList.add('bi-x', 'fs-5', 'fw-bold');
                    toggleBtnAside.classList.remove('bi-caret-right');
                    toggleBtnAside.classList.add('bi-caret-left');
                }
                isSidebarOpen = !isSidebarOpen;

                if (isSidebarOpen) {
                    toggleBtn.style.removeProperty('position');
                    toggleBtn.style.removeProperty('top');
                    toggleBtn.style.removeProperty('left');
                }

            });

        });
    </script>

    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
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
