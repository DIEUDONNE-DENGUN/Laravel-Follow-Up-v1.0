<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--Page title goes here--}}
    <title>Laravel Follow Up V 1.0 - @yield('title')</title>
    {{--include cross site scripting validation token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')  }}">
    {{--basic styling for the master template file--}}
    <style>
        body {
            width: 100%;
        }
        #content {
            padding: 10px;
            margin: 20px;
        }
    </style>
    {{--add dynamic css styles if need be--}}
    @yield('styles')
</head>
<body>

{{--set the base URL for the application here--}}
<input id="baseUrl" value="{{URL::to('/')}}" type="hidden">
