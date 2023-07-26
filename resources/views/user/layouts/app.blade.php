<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/theme/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/theme/assets/bootstrap/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/theme/assets/font-size/css/rvfs.css">
    <link rel="stylesheet" href="/theme/assets/tooltipster/css/tooltipster.bundle.css">
    <!-- icon css-->
    <link rel="stylesheet" href="/theme/assets/font-awesome/css/all.css">
    <link rel="stylesheet" href="/theme/assets/elagent-icon/style.css">
    <link rel="stylesheet" href="/theme/assets/niceselectpicker/nice-select.css">
    <link rel="stylesheet" href="/theme/assets/animation/animate.css">
    <link rel="stylesheet" href="/theme/assets/magnify-pop/magnific-popup.css">
    <link rel="stylesheet" href="/theme/assets/mcustomscrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="/theme/css/style.css">
    <link rel="stylesheet" href="/theme/css/responsive.css">
    <title>@yield('pageTitle') | IntelPS Docs</title>
</head>

<body data-scroll-animation="true">
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="round_spinner">
                <div class="spinner"></div>
                <div class="text">
                    <img src="/theme/img/spinner_logo.png" alt="">
                    <h4><span>Intelli</span>SAS</h4>
                </div>
            </div>
            <h2 class="head">Did You Know?</h2>
            <p></p>
        </div>
    </div>
    <div class="click_capture"></div>
    <div class="body_wrapper">
       @include('user.layouts.header')

        @yield('content')
      
    </div>

    <!-- Back to top button -->
    <a id="back-to-top" title="Back to Top"></a>

    <script src="/theme/js/jquery-3.2.1.min.js"></script>
    <script src="/theme/js/pre-loader.js"> </script>
    <script src="/theme/assets/bootstrap/js/popper.min.js"></script>
    <script src="/theme/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/theme/assets/bootstrap/js/bootstrap-select.min.js"></script>
    <script src="/theme/assets/tooltipster/js/tooltipster.bundle.min.js"></script>
    <script src="/theme/js/anchor.js"></script>
    <script src="/theme/assets/font-size/js/rv-jquery-fontsize-2.0.3.js"></script>
    <script src="/theme/js/parallaxie.js"></script>
    <script src="/theme/js/TweenMax.min.js"></script>
    <script src="/theme/assets/wow/wow.min.js"></script>
    <script src="/theme/assets/niceselectpicker/jquery.nice-select.min.js"></script>
    <script src="/theme/assets/magnify-pop/jquery.magnific-popup.min.js"></script>
    <script src="/theme/assets/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/theme/js/main.js"></script>
    @yield('js')
</body>
</html>