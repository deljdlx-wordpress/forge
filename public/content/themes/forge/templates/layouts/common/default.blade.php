<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @wp_head


    <style>
        body {
            background-color: {{wp_forge()->customizer->getSetting('background-color')}}
        }
        #header-menu {
            background-color: {{wp_forge()->customizer->getSetting('header-background-color')}}
        }
    </style>


</head>
<body class="forge">
    <div class="layout">


        @yield('page-content')

        <footer class="forge-layout-footer">
            <div class="container">
                @include('partials/footer')
            </div>
        </footer>

    </div>
    @wp_footer

</body>
</html>
