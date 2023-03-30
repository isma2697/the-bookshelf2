<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBooksRequest;
use App\Http\Requests\UpdateBooksRequest;
use App\Models\Books;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BooksController extends Controller
{


    private function formatData($books) {
        foreach ($books as $book) {
            
            $book->authors = json_decode($book->authors, true);
            if (is_array($book->authors)) {
                $book->authors = implode(", ", $book->authors);
            }
            $book->categories = json_decode($book->categories, true);
            if (is_array($book->categories)) {
                $book->categories = implode(", ", $book->categories);
            }
            
        }
        return $books;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mostrar vista de librosde la base de datos
        $books = Cache::remember('all_books', 60, function () {
            return Books::all();
        });
    
        $books = $this->formatData($books);
        // dd($books);
        return view('layouts.admin-books', compact('books'));
    }

    public function principal(){
        $books = Books::paginate(40);
        $books = $this->formatData($books);
        return view('layouts.principal', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBooksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Books::find($id);

        if ($book) {
            $book->authors = json_decode($book->authors, true);
            if (is_array($book->authors)) {
                $book->authors = implode(", ", $book->authors);
            }
            $book->categories = json_decode($book->categories, true);
            if (is_array($book->categories)) {
                $book->categories = implode(", ", $book->categories);
            }
            return view('layouts.only-book', ['book' => $book]);
        } else {
            abort(404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBooksRequest $request, Books $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $libros = Books::find($id);
        $libros->delete();
    }

    public function listadoPdf(){
        $books = Books::paginate(10);
        $pdf =Pdf::loadView("components.crud.Books.listado-books", compact('books'));
        return $pdf->stream('listado.pdf');
    }
}
