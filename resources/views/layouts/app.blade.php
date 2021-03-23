<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token()  }}" >
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
    @if (Auth::check())
      <meta name="user-id" content="{{ Auth::user()->id }}">
    @endif
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- <link rel="stylesheet" href="{{ mix('css/app.css') }}" /> -->
  </head>
  
  <body class="bg-gray-200">

    <nav class="p-6 bg-white flex justify-between mb-6">
      <ul class="flex items-center">
        <li>
          <a href="{{ route('home') }}" class="p-3">Home</a>
        </li>
        @auth
          <li>
            <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
          </li>
          <li>
            <a href="{{ route('showProducts') }}" class="p-3">Products</a>
          </li>
        @endauth
      </ul>

      <ul class="flex items-center">
        @auth
        <li>
          <a href="" class="p-3">{{ auth()->user()->name }}</a>
        </li>
        <li>
          <form action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit">Logout</Button>
          </form>
        </li>
        @endauth

        @guest
        <li>
          <a href="{{ route('login') }}" class="p-3">Login</a>
        </li>
        <li>
          <a href="{{ route('register') }}" class="p-3">Register</a>
        </li>
        @endguest

      </ul>

    </nav>
    @yield('content')
    <!-- <script defer src="{{ mix('js/app.js') }}"></script> -->
    <script defer src="{{ asset('js/app.js') }}"></script>
  </body>
</html>