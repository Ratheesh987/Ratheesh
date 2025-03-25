

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New - @yield('title')</title>
    <link rel="icon" href="{{asset('/assets')}}/images/favicon.ico" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets')}}/css/bootstrap/5.3.2/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets')}}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets')}}/css/custom.css">
     <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/assets')}}/css/icons/fontawesome/css/fontawesome.css">
    <link rel="stylesheet"  href="{{asset('/assets')}}/css/icons/fontawesome/css/brands.css">
    <link rel="stylesheet"  href="{{asset('/assets')}}/css/icons/fontawesome/css/regular.css">
    <link rel="stylesheet"  href="{{asset('/assets')}}/css/icons/fontawesome/css/solid.css">
     <!-- Font Awesome -->

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="{{asset('/assets')}}/css/sweetalert/sweetalert.min.css">
    
    @yield('header')

</head>
<body>
    
     <div class="wrapper" id="Fisho-Web">
        <aside id="sidebar" class="js-sidebar">
            <div class="h-100" id="sidebar-contents">
                <div class="sidebar-logo">
                    <a href="{{ route('dashboard') }}">
                    </a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="{{ route('dashboard') }}" class="sidebar-link">
                            <img src="{{asset('/assets')}}/images/icons/sidebar/dashboard-light.svg" class="pe-2 sidebar-icon light-icon">
                            <img src="{{asset('/assets')}}/images/icons/sidebar/dashboard-dark.svg" class="pe-2 sidebar-icon dark-icon">
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="" class="sidebar-link">
                            <img src="{{asset('/assets')}}/images/icons/sidebar/user-management-light.svg" class="pe-2 sidebar-icon light-icon">
                            <img src="{{asset('/assets')}}/images/icons/sidebar/user-management-dark.svg" class="pe-2 sidebar-icon dark-icon">
                            Add video
                        </a>
                    </li>
                    
                    
                    <li class="sidebar-item">
                        <a href="" class="sidebar-link">
                            <img src="{{asset('/assets')}}/images/icons/sidebar/notification-light.svg" class="pe-2 sidebar-icon light-icon">
                            <img src="{{asset('/assets')}}/images/icons/sidebar/notification-dark.svg" class="pe-2 sidebar-icon dark-icon">
                            wishlist
                        </a>
                    </li>
            
                   
                </ul>
            </div>
        </aside>
        <div class="main">
           

            <!-- Offcanvas Slider -->
            <div style="max-width: 280px;background: #FFF;" class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="pb-0 offcanvas-header justify-content-end">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body pt-0 ps-0">
                    
                </div>
            </div>
            <!-- Offcanvas Slider -->

            <main class="main-page-content">





            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.getElementById("success-toast").addEventListener("click", function() {
                        var successToast = document.querySelector(".success-toast");
                        var bsToast = new bootstrap.Toast(successToast);
                        bsToast.show();
                    });

                    document.getElementById("error-toast").addEventListener("click", function() {
                        var errorToast = document.querySelector(".error-toast");
                        var bsToast = new bootstrap.Toast(errorToast);
                        bsToast.show();
                    });
                });
            </script>


       




                @yield('content')



                </main>

               <!-- Footer -->
               <footer class="footer">
                    <div class="container-fluid px-lg-5">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <span class="footer-text"><script>document.write(new Date().getFullYear())</script><span class="px-1">&#169;</span><span class="brand-text"> <span style="color:#04F7FF !important;"></span></span></span>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="text-end">
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
         </div>
     </div>



     <!-- Toast -->



     <!-- Success Toast (Background Green for Success Purpose) class name="success-toast" -->
     @if (session('successmessage'))
        <div id="success-toast" class="toast bg-success align-items-center border-0 show" role="alert"
            aria-live="assertive" aria-atomic="true"
            style="position: fixed; top: 150px; right: 20px; z-index: 1050; border-radius: 8px;">
            <div class="toast-body d-flex text-white align-items-center">
                <i class="fa-regular fa-circle-check" style="font-size: 20px; margin-right: 10px;"></i>
                <div>
                    {{ session('successmessage') }}
                </div>
                <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif
    <!-- Success Toast (Background Green for Success Purpose) -->



    <!-- Error Toast (Background Red for Failed Purpose) class name="error-toast" -->
    @if (session('errormessage'))
        <div id="error-toast" class="toast bg-danger align-items-center border-0 show" role="alert"
            aria-live="assertive" aria-atomic="true"
            style="position: fixed; top: 80px; right: 20px; z-index: 1050; border-radius: 8px;">
            <div class="toast-body d-flex text-white align-items-center">
                <i class="fa-solid fa-circle-exclamation" style="font-size: 20px; margin-right: 10px;"></i>
                <div class="toast-body text-center">
                    {{ session('errormessage') }}
                </div>
                <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif
    <!-- Success Toast (Background Green for Success Purpose) -->




<script>
    document.addEventListener("DOMContentLoaded", function() {
        var successMessage = "{{ session('successmessage') }}";
        var errorMessage = "{{ session('errormessage') }}";

        if (successMessage) {
            var successToast = new bootstrap.Toast(document.querySelector(".success-toast"));
            successToast.show();
        }

        if (errorMessage) {
            var errorToast = new bootstrap.Toast(document.querySelector(".error-toast"));
            errorToast.show();
        }
    });
</script>




<!-- JQuery CDN -->
<script src="{{asset('/assets')}}/js/jquery/jquery.min.js"></script>

<script type="text/javascript" src="{{asset('/assets')}}/js/script.js"></script>
<script type="text/javascript" src="{{asset('/assets')}}/js/bootstrap/5.3.2/bootstrap.min.js"></script>

 <!-- SweetAlert JS -->
 <script src="{{asset('/assets')}}/js/sweetalert/sweetalert.min.js"></script>


@yield('footer') 
</body>
</html>

