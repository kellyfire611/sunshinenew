<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="{{ asset('vendor/normalize/normalize.min.css') }}">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="{{ asset('vendor/paper-css/paper.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/paper-css/custom-paper.css') }}">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>@page { size: @yield('paper-size') }</style>

  @yield('custom-css')
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="@yield('paper-class')">
  @yield('content')
</body>

</html>
