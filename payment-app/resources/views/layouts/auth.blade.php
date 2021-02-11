<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ env("APP_NAME") }} | @yield('title')</title>

        @include('partials.auth.style')
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        
                <div class="row justify-content-md-center">
                    <div class="col-lg-9 login-container">
                        @yield("content")
                    </div>
                </div>

                @include('partials.auth.footer')
           

        @include('partials.auth.script')
    </body>
</html>
