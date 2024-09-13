<!DOCTYPE html>
<html lang="es">

<!-- Head -->
@include('layouts.head')

<body>
    <header>
        <!-- Navbar -->
        @include('layouts.navbar')
        <script>
            $( function() {
                $( "#tabs" ).tabs();
            } );
        </script>
    </header>

    <!-- SideBar -->

    @include('layouts.sidebar')


    <main class="p-0 border bg-white rounded shadow-lg principal-container">
        <!-- Contenido de la Página -->
        @yield('content')
    </main>

    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('scripts')
</body>

</html>
