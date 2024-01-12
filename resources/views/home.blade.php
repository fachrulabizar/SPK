<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PT. Shiddiq Sarana Mulya</title>
    <link rel="shortcut icon" href="{{asset('guest/assets/images/logo.png')}}" />
    <link rel="stylesheet" href="{{asset('guest/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('guest/global.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
    <link rel="shortcut icon" href="{{asset('admin/images/logo.png')}}" />
</head>

<body>
    <!--HamBurger Icon-->
    <div class="bars" id="nav-action">
        <span class="bar"> </span>
    </div>

    <!--Navbar Links-->
    <nav id="nav">
        <ul>
            <li class="shape-circle circle-two">
                @if(auth()->user())
                <a href="{{url('/dashboard')}}">Dashboard</a>
                @else
                <a href="{{url('/login')}}">Login</a>
                @endif
            </li>
            <li class="shape-circle circle-three"><a href="{{url('/kriteria')}}">Kriteria</a></li>
            <li class="shape-circle circle-three"><a href="{{url('/calculation')}}">Calculation</a></li>
            <li class="shape-circle circle-five"><a href="/">Home</a></li>
        </ul>
    </nav>

    <!--Main Body Content-->
    <div class="home">
        <article class="container reveal">
            <img class="rounded mx-auto d-block" src="{{asset('guest/assets/images/logo.png')}}" width="250px"
                height="250px">
            <h1>PT. Shiddiq Sarana Mulya</h1>
            <h4>Developmen And Usage Of ISO 9001 & OHSAS Integration</h4>
        </article>
    </div>
</body>

<script>
// Setting up the Variables
var bars = document.getElementById("nav-action");
var nav = document.getElementById("nav");


//setting up the listener
bars.addEventListener("click", barClicked, false);


//setting up the clicked Effect
function barClicked() {
    bars.classList.toggle('active');
    nav.classList.toggle('visible');
}

function reveal() {
    var reveals = document.querySelectorAll(".reveal");

    for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 0;

        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
        }
    }
}

window.addEventListener("load", reveal);
</script>

</html>