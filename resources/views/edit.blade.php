<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Edit Book</title>
</head>
<body>
    <div class="container">
        <div class="">
            <div class="">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between">
                      {{ __('Edit Book') }} 
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('add.update',  $buku->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="Judul" value="{{$buku->Judul}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Pengarang</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="Pengarang" value="{{$buku->Pengarang}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Penerbit</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="Penerbit" value="{{$buku->Penerbit}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Gambar Cover</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="Gambar">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>            
                    </div>
                </div>
            </div>
        </div>
</body>
</html>