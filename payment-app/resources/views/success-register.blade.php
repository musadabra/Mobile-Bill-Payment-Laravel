<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Radiation Monitoring</title>

        @include('partials.app.style')
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('partials.app.navbar')

            @include('partials.app.RegistrationSidebar')

            <div class="content-wrapper" style="margin-bottom: 140px;">
                <div class="content-header no-padding">
                    <div class="container-fluid">
                        <div class="row mb-2 no-padding">
                            <div class="col-sm-12 no-padding">
                                <ol class="breadcrumb float-sm-left tab-items">
                                    <li data-link='welcome' class="breadcrumb-item padding-right-30px tab active-navigation">
                                        <a class="link-welcome" href="#/">
                                            Welcome
                                        </a>
                                    </li>

                                    {{-- <li class="breadcrumb-item">
                                        <a href="">
                                            Dosimetric ...
                                        </a>
                                        <img class="cancel-icon" src="{{ asset('template/img/icons/cancel.png') }}">
                                    </li>

                                    <li class="breadcrumb-item active-navigation">
                                        <a href="">
                                            Add New E ...
                                        </a>

                                        <img class="cancel-icon" src="{{ asset('template/img/icons/cancel.png') }}"/>
                                    </li>

                                    <li class="breadcrumb-item">
                                        <a href="">
                                            Add New I ...
                                        </a>
                                        <img class="cancel-icon" src="{{ asset('template/img/icons/cancel.png') }}"/>
                                    </li> --}}
                                </ol>   
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="main-content-begin">
               
                     </div>  
                     <!-- WARNING -->
                     <div class="col-lg-12">
                       
                     </div>
               
                     <!-- BEGINNING OF A FORM -->
                     <div class="col-lg-12 pt-2 form-name-container">
                       
                     </div>

                    <!-- HANDLING VALIDATION ERRORS -->
                    <div class="col-lg-8 offset-lg-1">
                        <div class="col-lg-12">
                            <h5>Successfully Registered</h5>
                            <P>Go to <a href="/" style="color: rgb(0, 112, 216);">login page.</a></P>
                        </div>
                    
                     </div>
               </div>
            </div>
            @include('partials.app.footer')
            
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
        </div>
        
        @include('partials.app.script')
    </body>
</html>
