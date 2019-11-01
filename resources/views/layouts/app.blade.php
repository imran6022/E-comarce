<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="">
        <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ url('fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ url('css/custom.css') }}">
        <script src="{{ url('js/jquery-3.3.1.slim.min.js') }}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <title>
            @yield('title', 'Ecommerce')
        </title>
        
    </head>
    <body>
        <div class="col-12">
            @include('inc/menu')
            @yield('content')

            <footer class="bg-menu mt-3">
                <div class="row">
                    <div class="col-4 bg-menu">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"><a class="nav-link mt-3" href="">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Defarent Items</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Defarent Items</a></li>
                        </ul>
                    </div>
                    <div class="col-4 bg-menu">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"><a class="nav-link mt-3" href="">Defarent Items</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Defarent Items</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Defarent Items</a></li>
                        </ul>
                    </div>
                    <div class="col-4 bg-menu">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"><a class="nav-link mt-3" href="">Defarent Items</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Defarent Items</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Defarent Items</a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>

        
        <script src="{{ url('js/popper.min.js') }}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="{{ url('js/bootstrap.min.js') }}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>