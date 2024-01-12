<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kriteria - PT. Shiddiq Sarana Mulya</title>
    <link rel="shortcut icon" href="{{asset('guest/assets/images/logo.png')}}" />
    <link rel="stylesheet" href="{{asset('guest/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('guest/global.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<style>
@import url('https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css');

.kriteria h1 {
    margin-top: 80px;
    color: white;
}

.kriteria hr {
    color: white;
}

.kriteria ul {
    width: min(100%, 60rem);
    overflow: hidden;
    margin-inline: auto;
    padding-inline: clamp(1rem, 5vw, 4rem);
    list-style: none;
    perspective: 1000px;
    display: grid;
    row-gap: 0.5rem;
    margin-bottom: 50px;
}

.kriteria ul li.card {
    position: relative;
    padding-block: 1.5rem;
    padding-inline: 2rem;
    background-color: var(--bg-color);
    background-image: linear-gradient(to right, rgb(0 0 0 / .15), transparent);
    transform-style: preserve-3d;
    color: var(--color);
    display: grid;
    grid-template: 'icon''title''content';
    row-gap: 0.5rem;
    column-gap: 2rem;
}

.kriteria ul li.card::before,
.kriteria ul li.card::after {
    --side-rotate: 60deg;
    content: "";
    position: absolute;
    top: 0;
    height: 100%;
    width: 100%;
    transform-origin: calc(50% - (50% * var(--ry))) 50%;
    transform: rotateY(calc(var(--side-rotate) * var(--ry)));
    background-color: inherit;
    background-image: linear-gradient(calc(90deg * var(--ry)), rgb(0 0 0 / .25), rgb(0 0 0 / .5));
}

.kriteria ul li.card::before {
    --ry: -1;
    right: 100%
}

.kriteria ul li.card::after {
    --ry: 1;
    left: 100%
}

.kriteria ul li.card .icon {
    grid-area: icon;
    display: grid;
    place-items: center;
}

.kriteria ul li.card .icon i {
    font-size: 2rem;
}

.kriteria ul li.card .title {
    grid-area: title;
    font-size: 1.25rem;
    font-weight: 700;
    text-align: center;
}

.kriteria ul li.card .content {
    grid-area: content;
}

@media (min-width: 30rem) {
    .kriteria ul li.card {
        grid-template: 'icon title''icon content';
        text-align: left;
    }

    .kriteria ul li.card .title {
        text-align: left
    }
}
</style>

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
    <div class="container">
        <div class="row kriteria reveal">
            <h1 class="text-center">BOBOT KRITERIA PT. SHIDDIQ SARANA MULYA</h1>
            <hr />
            <ul class="mt-4">
                <li class="card" style="--color:#ececec; --bg-color:#b3953c">
                    <div class="icon"><i class="fa-solid fa-briefcase"></i></div>
                    <div class="title">Kriteria Pengalaman</div>
                    <div class="content text-justify">Tenaga kerja yang memiliki pengalaman lebih dari 25 pengalaman
                        mendapat nilai
                        tertinggi karena dianggap sudah ahli dan mumpuni pada bidang pekerjaan yang tenaga kerja
                        tersebut kuasai.</div>
                </li>
                <li class="card" style="--color:#ececec; --bg-color:#2c2c2c">
                    <div class="icon"><i class="fa-solid fa-gear"></i></div>
                    <div class="title">Kriteria Bidang Keahlian</div>
                    <div class="content text-justify">Tenaga kerja diharuskan memiliki sertifikat keahlian yang
                        dikeluarkan oleh
                        lembaga pengembangan jasa konstruksi (LPJK) agar kemampuan yang telah dimiliki dapat diakui,
                        untuk bidang keahlian jika tenaga kerja tersebut memiliki sertifikat maka akan diberikan nilai
                        sesuai dengan tingkatannya, dimulai dari Ahli muda, ahli madya hingga yang paling tinggi adalah
                        ahli utama.</div>
                </li>
                <li class="card" style="--color:#ececec; --bg-color:#3b3b3b">
                    <div class="icon"><i class="fa-solid fa-school"></i></div>
                    <div class="title">Kriteria Pendidikan</div>
                    <div class="content text-justify">Tenaga kerja yang akan diusulkan diharuskan memiliki pendidikan
                        minimal D3 sesuai kesepakatan dan aturan yang ada pada PT. Shiddiq Sarana Mulya.
                    </div>
                </li>
                <li class="card" style="--color:#ececec; --bg-color:#535353">
                    <div class="icon"><i class="fa-solid fa-group"></i></i></i></div>
                    <div class="title">Kriteria Posisi Jabatan</div>
                    <div class="content text-justify">Tenaga Kerja yang merupakan sebuah tingkatan untuk penggolongan
                        jabatan dalam perusahaan yang
                        disusun berdasarkan berat dan ringannya tanggung jawab dan tugas pekerjaan di dalam organisasi
                        di perusahaan yang bersangkutan.
                    </div>
                </li>
                <li class="card" style="--color:#ececec; --bg-color:#032437">
                    <div class="icon"><i class="fa-solid fa-person"></i></div>
                    <div class="title">Kriteria Usia</div>
                    <div class="content text-justify">Tenaga kerja minimal berusia 21 tahun dan batas usia maksimum
                        adalah 45 tahun, hal ini sesuai dengan peraturan yang berlaku di PT. Shiddiq Sarana Mulya.
                    </div>
                </li>
            </ul>
        </div>
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