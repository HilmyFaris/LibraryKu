<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LibraryKu</title>
    <script>
        function exportPdf() {
          const doc = new jsPDF();
          doc.text(20, 20, "Daftar Buku");
        
          let y = 40;
          @foreach ($buku as $index => $book)
          doc.text(20, y, "Judul: {{$book->Judul}}");
          doc.text(20, y+10, "Pengarang: {{$book->Pengarang}}");
          doc.text(20, y+20, "Penerbit: {{$book->Penerbit}}");
          y += 40;
          @endforeach
        
          doc.save("daftar-buku.pdf");
        }
        </script>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <h5 class="navbar-brand font-we" href="{{ url('/') }}">
                <img src="{{ asset('image/book.png') }}" alt="Logo" width="25" height="25">
                LibraryKu 
            </h5>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="GET">
                            <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                          </form>    
                    @endguest
                    
                </ul>
            </div>
        </div>
    </nav>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('Dashboard') }}</h5>
                </div>

                <div class="card-body">
                    <div class="body-card d-flex flex-row flex-wrap justify-content-around mt-4">
                      @foreach ($buku as $index => $book)
                        <div class="card rounded mt-4" style="width: 16rem;" style="height:395px; overflow:hidden;"  >
                          <div class="d-flex justify-content-center">                        
                            <img style="object-fit: cover; height: 90%; width: 90%;"src={{ asset('cover/'. $book->Gambar)}} alt="" width="200" class="rounded mt-4">
                          </div>
                          <div class="text-center mt-2 mb-2">
                            <h5>{{$book->Judul}}</h5>
                          </div>
                          <div class="text-center">
                            <p>{{$book->Pengarang}}</p>
                          </div>
                          <div class="text-center">
                            <p>{{$book->Penerbit}}</p>
                          </div>
                          <button onclick="exportPdf()" id="font-family">Export to PDF</button>
                        </div> 
                        @endforeach              
                    </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>