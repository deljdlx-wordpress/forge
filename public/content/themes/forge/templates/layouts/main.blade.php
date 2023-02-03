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

        <header>
            <div style="background-image: url(<?=get_theme_file_uri('assets/images/header-01.png');?>); background-size: contain; background-position: 50%; background-repeat: no-repeat; height: 50vh;"></div>



            <div class="site-header-title" style=";">
                <div class="site-title fancy">DelJdlx Forge</div>
                <div class="site-pitch fancy">Code snippets vault</div>
            </div>
        </header>


        <div class="container">

            <div class="row">
                <div class="col">
                    @include('partials/navbar')
                </div>
            </div>


            <div class="row" style="margin-top: 1rem">
                <div class="col col-8">
                    <div class="content-block">
                        @yield('content')
                    </div>
                </div>

                <div class="col col-4">
                    @include('partials/navbar-right')
                </div>


            </div>

            {{-- <main>
                <div class="row">
                    <div class="col col-9">
                        <div class="content-block" style="margin-right: 1rem;">
                            @yield('content')
                        </div>
                    </div>
                    <div class="col col-3">
                        <div class="content-block">
                            RIGHT MENU
                        </div>
                    </div>
                </div>
            </main> --}}



        </div>
        <footer>
            @include('partials/footer')
        </footer>
    </div>
    @wp_footer

</body>
</html>
