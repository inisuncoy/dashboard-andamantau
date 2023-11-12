<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @stack('scripts')



  <style>
    .content{
        display:none;
    }

    .loader{
        height: 100%;
        width: 100%;
        overflow:hidden;
        background-color: #2D76E5;
        position: absolute;
    }

    .loader>div{
        height:100px;
        width:100px;
        border: 15px solid white;
        border-top-color: #2a88e6;
        position: absolute;
        margin: auto;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        border-radius:50%;
        animation: spin 1.5s infinite linear;
    }

    @keyframes spin{
        100%{
            transform: rotate(360deg)
        }
    }
  </style>

</head>

<body>
    <div class="loader">
        <div></div>
    </div>
    <div class="relative p-5 content">
        @include('components.sidebar')

        <div class="ml-[264px] px-8">
        @yield('pages')
        </div>

    </div>

    @stack('js')
    <script>
        $(window).on('load', function(){
            $(".loader").fadeOut(1000);
            $(".content").fadeIn(1000);
        })

        function showLoader() {
            $("#loader").show();
        }

        function hideLoader() {
            $("#loader").hide();
        }

        $(".loadButton").click(function () {
            $(".loadButton").disabled;
            $(".content").fadeOut(500);
            $(".loader").fadeIn(500);
        });


    </script>

    @include('sweetalert::alert')
</body>

</html>
