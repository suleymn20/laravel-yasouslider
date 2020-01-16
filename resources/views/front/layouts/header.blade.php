<!DOCTYPE html>
<html lang="tr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" type="image/png" href="@if(!$config->favicon==null){{$config->favicon}}@else{{asset('back/')}}/favicon.png @endif" />
  <title>@yield('title')</title>
  <meta http-equiv="refresh" content="1800;">
  @toastr_css

  <!-- Bootstrap core CSS -->
  <link href="{{asset('front/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{asset('front/')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href="{{asset('front/')}}/css/full-slider.css" rel="stylesheet">
  <!-- Custom styles for this template -->

</head>

<body>
