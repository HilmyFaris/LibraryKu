@extends('layouts.app')

@section('title')
    {{$buku->judul}} | LibraryKu
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-2 justify-content-center" >
                <div class="card">
                    <div class="card-header">{{$buku->judul}}</div>

                    <div class="card-body">
                        <div class="flex justify-start items-start pb-8 mb-8 border-b-2 border-b-slate-300">
                            <img class="w-64 h-96 box-content object-cover pr-8 mr-8 border-r-2 border-r-slate-300 mb-4" src="{{asset('cover/'.$buku->Gambar)}}" alt="" width="380">
                            <div>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Judul</td>
                                            <td>: {{$buku->Judul}}</td>
                                        </tr>
                                        <tr>
                                            <td>Pengarang</td>
                                            <td>: {{$buku->Pengarang}}</td>
                                        </tr>
                                        <tr>
                                            <td class="pr-4">Penerbit</td>
                                            <td>: {{$buku->Penerbit}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="{{url('home')}}"> <button type="button" class="btn btn-primary mt-3 px-3">Kembali</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
@endsection