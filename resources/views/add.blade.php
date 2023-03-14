<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Add Book</title>
</head>
<body>
    <div class="container">
        <div class="">
            <div class="">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between">
                      {{ __('Add Book') }} 
                    </div>
    
                    <div class="card-body">
                        <form method="post" action="/add" enctype="multipart/form-data">
                          {{csrf_field()}}
                            <div class="form-group">
                              <label>Judul</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" name="judul">
                            </div>
                            <div class="form-group">
                              <label>Pengarang</label>
                              <input type="text" class="form-control" id="exampleInputPassword1" name="pengarang">
                            </div>
                            <div class="form-group">
                              <label>Penerbit</label>
                              <input type="text" class="form-control" id="exampleInputPassword1" name="penerbit">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlFile1">Gambar Cover</label>
                              <input type="file" class="form-control-file" name="gambar">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>              
                    </div>
                </div>
            </div>
        </div>
</body>
</html>