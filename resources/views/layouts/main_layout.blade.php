<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.partials._head')
</head>

<body>

    <!-- ======= Header ======= -->
    @include('layouts.partials.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('layouts.partials.sidebar')
    <!-- End Sidebar-->

    @yield('content')
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('layouts.partials.footer')

    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layouts.partials.footer_script')
    @yield('script')
    <script>
        $(document).ready(function() {
            $('table').dataTable()
        })
    </script>

</body>

</html>
