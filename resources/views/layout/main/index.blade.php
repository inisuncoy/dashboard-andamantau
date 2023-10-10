<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @stack('scripts')

</head>

<body>
  <div class="relative p-5 ">
    @include('components.sidebar')

    <div class="ml-[264px] px-8">
      @yield('pages')
    </div>

  </div>

  @stack('js')
  @include('sweetalert::alert')
</body>

</html>
