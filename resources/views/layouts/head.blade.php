<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>{{ config('app.name') }} - @yield('title') </title>

    <!-- CSS  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">  
    <link rel="shortcut icon" href="{{ Voyager::image(Voyager::setting('admin.icon_image', '')) }}" type="image/png">
    <link rel="stylesheet" href="https://unpkg.com/materialize-stepper@3.1.0/dist/css/mstepper.css">
    
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">


    @yield('style')
</head>
<body>
  
    @yield('app')
  
    <!--  Scripts-->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://unpkg.com/materialize-stepper@3.1.0/dist/js/mstepper.js"></script>
    <script>
        $(function () {
            $('select').formSelect();
            $('.datepicker').datepicker();
            $('.sidenav').sidenav();
            $('.sidenav-dropdown-trigger').dropdown({ coverTrigger: false, hover: true, alignment: 'right'});
            $('.navbar-dropdown-trigger').dropdown({ coverTrigger: false, constrainWidth: false});
            $('.collapsible').collapsible();
        });
    </script>

    @yield('script')
</body>
</html>
