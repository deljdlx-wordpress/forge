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

        <div class="container">
            <header>
                <img src="<?=get_theme_file_uri('assets/images/present-01.png');?>" style="background-size: contain; background-position: 0 50%; background-repeat: no-repeat; height: 50vh; margin-left: 0vw"/>


                <div style="position: absolute; text-algign: center; top: 25vh; padding-left: 430px;">
                    <div class="site-title fancy" style="width: calc(100% - 430px)">
                        <h1 style="font-size: 4rem; text-align: center">{{$post->getTitle()}}</h1>
                    </div>
                </div>

            </header>
        </div>


        <div class="container">


            <div class="row">
                <div class="col col-12">
                    @include('partials/navbar')
                </div>
            </div>


            <div class="row" style="margin-top: 1rem;">

                <div class="col col-8">
                    <div class="content-block" style="margin-right: 1rem;background-color: #252526">
                        <div style="">
                            <div class="col col-12" style="height: 400px; width: 400px; background-image: url(<?=get_the_post_thumbnail_url()?>); background-size: cover; float: left; margin-right: 1rem;">
                            </div>
                            {!!$post->getContent()!!}

                        </div>
                    </div>

                    {{-- @yield('content') --}}
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
        <footer style="margin-top: 1rem">
            @include('partials/footer')
        </footer>
    </div>
    @wp_footer

</body>
</html>
