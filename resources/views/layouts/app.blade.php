<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <!-- bootstrap -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js')}}" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>


    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    @include('layouts.app.header')
    <div class="container my-4">
        @yield('content')

        @include('layouts.app.footer')
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/query/1.12.4/jquery.min.js"></script>

    <script type="text/javascript">
        // Get the alert element
        const alertEl = document.querySelector('.alert');

        // Hide the alert element after 3 seconds
        setTimeout(() => {
            alertEl.classList.add('fade', 'show');
            setTimeout(() => {
                alertEl.remove();
            }, 1000); // Wait for 1 second (1000 ms) before removing the element
        }, 3000);
    </script>
</body>

</html>