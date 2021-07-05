<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <title>Gallery Marin</title>
  </head>
  <body>
    
      {{-- sidebar --}}
        <div class="sidebar position-fixed" style="background-color: #EBE8E8;box-shadow: 2px 0px 5px #c9c8c8; z-index: 1;">
          <div class="container">
            <div class="d-flex flex-column">
              <img src="{{ asset('asset/icon/logo.jpeg') }}" alt="" class="rounded-circle align-self-center" width="40%" height="40%" style="margin: 10% 0">
              <p class="align-self-center fw-bold" style="color: #8990AD">Welcome back, <span>Admin</span></p>
              <p class="fw-bold">Main Menu</p>
              <div class="garis"></div>
            </div>
          </div>
          <div class="list-sidebar">
            {{-- <ul>
              <li><a href="" class="nav-link d-flex flex-row align-items-center"><img src="{{ asset('asset/icon/search-1.png') }}" alt="" width="10%" height="10%" style="margin-left: 30px">Dashboard</a></li>
              <li class="nav-item dropdown "><a href="#" class="nav-link dropdown-toggle d-flex flex-row align-items-center" id="navbarDropdown" role="button" data-bs-toggle="dropdown"><img src="{{ asset('asset/icon/search-1.png') }}" alt="" width="10%" height="10%" style="margin-left: 30px">Penjualan</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a href="" class="dropdown-item">Coba</a>
                </div>
              </li>
              <li><a href="" class="nav-link d-flex flex-row align-items-center"><img src="{{ asset('asset/icon/search-1.png') }}" alt="" width="10%" height="10%" style="margin-left: 30px">Pembelian</a></li>
              <li><a href="" class="nav-link d-flex flex-row align-items-center"><img src="{{ asset('asset/icon/search-1.png') }}" alt="" width="10%" height="10%" style="margin-left: 30px">Persediaan</a></li>
              <li><a href="" class="nav-link d-flex flex-row align-items-center"><img src="{{ asset('asset/icon/search-1.png') }}" alt="" width="10%" height="10%" style="margin-left: 30px">Laporan</a></li>
            </ul> --}}
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#"><img src="{{ asset('asset/icon/search-1.png') }}" alt="" width="10%" height="10%" style="margin-left: 30px;margin-right:5px">Dashboard</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{{ asset('asset/icon/search-1.png') }}" alt="" width="10%" height="10%" style="margin-left: 30px;margin-right:5px">Penjualan
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Input Produk</a></li>
                  <li><a class="dropdown-item" href="#">List Produk</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{{ asset('asset/icon/shopping-cart.png') }}" alt="" width="10%" height="10%" style="margin-left: 30px;margin-right:5px">Pembelian
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Pemesanan Bahan Baku</a></li>
                  <li><a class="dropdown-item" href="#">List Pemesanan</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{{ asset('asset/icon/search-1.png') }}" alt="" width="10%" height="10%" style="margin-left: 30px;margin-right:5px">Persediaan
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Input Supplier</a></li>
                  <li><a class="dropdown-item" href="#">Persediaan Bahan Baku</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#"><img src="{{ asset('asset/icon/search-1.png') }}" alt="" width="10%" height="10%" style="margin-left: 30px;margin-right:5px">Laporan</a>
              </li>
            </ul>
          </div>
        </div>
      {{-- end sidebar --}}

      {{-- navbar --}}
      <div class="d-flex flex-column position-absolute" style="width: 100%;height:100%;"> 
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #EBE8E8">
          <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">@yield('judul-section')</a>
          </div>
        </nav>
        <div class="main-section">
          <p class="fw-bold fs-2">@yield('judul-section')</p>
          @yield('main')
        </div>
      </div> 
      {{-- end navbar --}}
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>