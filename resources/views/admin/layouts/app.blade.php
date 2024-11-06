<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/dist/css/base.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/component_ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/skin-dark-1.min.css') }}">
    @stack('local')
    <script src="{{ asset('assets/webfont/1.6.26/webfont.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Alegreya+Sans:100,100i,300,300i,400,400i,500,500i,700,700i,800,800i,900,900i', 'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', 'Open Sans']
            }
        });
    </script>
</head>
<body>
    <div id="wrapper" class="wrapper animsition">
        @include('admin.layouts.navigation')
        <div class="control-sidebar-bg"></div>
        <div id="page-wrapper">
            @yield('master')
        </div>
    </div>
</body>
<script src="{{ asset('assets/plugins/jQuery/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/metisMenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/plugins/lobipanel/lobipanel.min.js') }}"></script>
<script src="{{ asset('assets/plugins/animsition/js/animsition.min.js') }}"></script>
<script src="{{ asset('assets/plugins/fastclick/fastclick.min.js') }}"></script>
<script src="{{ asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/plugins/modals/classie.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/modals/modalEffects.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/dist/js/app.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/jQuery.style.switcher.js') }}"></script>
@stack('scripts')
</html>
