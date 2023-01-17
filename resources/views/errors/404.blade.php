<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="The purpose is to help my brain. It will remember my belongings on my behalf."><!-- Fav Icon  -->

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
    <!-- Page Title  -->
    <title>Error 404 | Resource organizer</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('assets/css/dashlite.css?ver=3.1.1')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('assets/css/theme.css?ver=3.1.1')}}">
</head>

<body class="nk-body bg-white npc-default pg-error">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle wide-xs mx-auto">
                        <div class="nk-block-content nk-error-ld text-center">
                            <h1 class="nk-error-head">404</h1>
                            <h3 class="nk-error-title">Oops! Why you’re here?</h3>
                            <p class="nk-error-text">We are very sorry for inconvenience. It looks like you’re try to access a page that either has been deleted or never existed.</p>
                            <a href="{{route('dashboard')}}" class="btn btn-lg btn-primary mt-2">Back To Home</a>
                        </div>
                    </div><!-- .nk-block -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{asset('assets/js/bundle.js?ver=3.1.1')}}"></script>
    <script src="{{asset('assets/js/scripts.js?ver=3.1.1')}}"></script>

</html>