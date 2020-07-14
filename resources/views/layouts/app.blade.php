<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
      <!-- Bootstrap Core Css -->
      <link href="/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
      <!-- Waves Effect Css -->
      <link href="/plugins/node-waves/waves.css" rel="stylesheet" />
      <!-- Animation Css -->
      <link href="/plugins/animate-css/animate.css" rel="stylesheet" />
      <!-- Morris Chart Css-->
      <link href="/plugins/morrisjs/morris.css" rel="stylesheet" />
      <!-- Custom Css -->
      <link href="/css/style.css" rel="stylesheet">
      <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
      <link href="/css/themes/all-themes.css" rel="stylesheet" />
      <!-- Jquery Core Js -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- Table -->
      <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
      </link>
      <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
      <style>
         .pa:hover{
         background-color:orange;
         }
      </style>


</head>
<body>
    <div id="app">
       

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>



</html>
