<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.index', [
            'books' => Book::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create', [
            'books' => Book::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'categorie_id' => 'required',
            'stock' => 'required',
            'deskripsi' => 'required',
        ]);

        $books = Book::create([
            'name' => $request->name,
            'categorie_id' => $request->categorie_id,
            'stock' => $request->stock,
            'deskripsi' => $request->deskripsi
        ]);

        // return $request;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('book.edit', [
            'book' => $book,
            'categorie' => Category::all()
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $id)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'categorie_id' => 'required',
        //     'stock' => 'rsequired',
        //     'deskripsi' => 'required',
        // ]);

        // $id->update($request->all());

        // return redirect()->route('book.index')->with('success', ' Data telah diperbaharui!');

        // $book = Book::find($id)->update($request->all());

        // return back()->with('success', ' Data telah diperbaharui!');

        $this->validate($request, [
            'name'     => 'required',
            'categorie_id'   => 'required',
            'stock'     => 'required',
            'deskripsi'     => 'required',
        ]);

        //get data Blog by ID
        $book = Book::findOrFail($id);

        if ($request->file('image') == "") {

            $book->update([
                'name'     => $request->name,
                'categorie_id'   => $request->categorie_id,
                'stock' => $request->stock,
                'deskripsi' => $request->deskripsi
            ]);
        } else {

            $book->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        if ($book) {
            //redirect dengan pesan sukses
            return redirect()->route('book.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('book.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        if ($book) {
            return redirect()->route('book.index')->with(['success' => 'Data berhasil dihapus']);
        } else {
            return redirect()->route('book.index')->with(['error' => 'Data gagal dihapus']);
        }
    }
}
