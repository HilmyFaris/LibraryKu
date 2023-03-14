<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Book::all();
        return view('dashboard', ['buku' => $buku]);
    }

    public function search(Request $request)
    {
    $query = $request->input('query');

    $buku = Book::where('Judul', 'LIKE', "%$query%")
                 ->orWhere('Pengarang', 'LIKE', "%$query%")
                 ->orWhere('Penerbit', 'LIKE', "%$query%")
                 ->get();

    return view('home', ['buku' => $buku]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buku = Book::create($request->all());
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('cover/', $request->file('gambar')->getClientOriginalName());
            $buku->gambar = $request->file('gambar')->getClientOriginalName();
            $buku->save();
        }
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = Book::findOrFail($id);

        return view('detail', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Book::find($id); //Ambil data buku dri database berdasarkan id
        return view('edit', compact('buku')); //Kirim data buku ke view edit.blade.php
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $buku = Book::find($id);
        $buku->Judul = $request->input('Judul');
        $buku->Pengarang = $request->input('Pengarang');
        $buku->Penerbit = $request->input('Penerbit');

        if($request->hasFile('Gambar')){
            $file = $request->file('Gambar');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('cover'), $filename);
            $buku->Gambar =$filename;
        }
        $buku->save();
        return redirect('/home')->with('success', 'Buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Book::findOrFail($id);
        $buku->delete();

        return redirect('/home');
    }
}
