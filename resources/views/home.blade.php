
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fortune League</title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- styles -->
    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
</head>
<body>

<div id="app">
    <header-section></header-section>
    <profile></profile>
    <footer-section></footer-section>
</div>
<!-- scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
