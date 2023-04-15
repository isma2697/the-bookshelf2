<?php

namespace App\Http\Controllers;
use App\Models\Books;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

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
        $books = Books::all();
    
        $books = $this->formatData($books);
        // dd($books);
        return view('layouts.admin-books', compact('books'));
    }

   public function popular(){
    $books = Books::leftJoin('likes', 'books.id', '=', 'likes.books_id')
                ->select('books.*', DB::raw('COUNT(likes.id) as likes_count'))
                ->groupBy('books.id')
                ->orderBy('likes_count', 'DESC')
                ->paginate(45);

    $books = $this->formatData($books);
    // dd($books);
    return view('layouts.most-popular', compact('books'));
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
        return view('components.crud.Books.create-book');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datos = $request->all();
        //quitar el token para que no de error
        unset($datos['_token']);
        Books::create($datos);
        return redirect()->route('admin.books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $books = Books::paginate(10);
        $books = $this->formatData($books);

        $book = Books::find($id);
        $comments = $book->comentarios ?? null;
        $comments = Comentario::where('books_id', $id)->with('user')->get();

        foreach ($comments as $comment) {
            $comment->users_id = $comment->user->name;
        }
        
        if ($book) {
            $book->authors = json_decode($book->authors, true);
            if (is_array($book->authors)) {
                $book->authors = implode(", ", $book->authors);
            }
            $book->categories = json_decode($book->categories, true);
            if (is_array($book->categories)) {
                $book->categories = implode(", ", $book->categories);
            }
            return view('layouts.only-book', compact('book', 'books', 'comments'));
        } else {
            abort(404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $book = Books::find($id);
        return view('components.crud.Books.edit-book', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $book = Books::find($id);
        unset($request['_token']);
        $book->update($request->all());
        return redirect()->route('admin.books.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $libros = Books::find($id);
        $libros->delete();
    }

    public function listadoPdf(){
        $books = Books::all();
        $books = $this->formatData($books);
        $pdf =Pdf::loadView("components.crud.Books.listado-books", compact('books'));
        return $pdf->stream('listado.pdf');
    }

    public function toggleLike(Books $book)
        {
            $user_id = auth()->id();

            $liked = $book->likes->contains('users_id', $user_id);
             
            if ($liked) {
                $book->likes()->where('users_id', $user_id)->delete();
            } else {
                $book->likes()->create(['users_id' => $user_id]);
            }
            
            return back();
        }

    public function show_category($category){
        $books = Books::where('categories', 'LIKE', '%'.$category.'%')->paginate(30);
        $books = $this->formatData($books);
        return view('layouts.category', compact('books'));
    }

    public function show_years($year)
    {
        $year = (int) $year;
        $limit_year = $year + 20;
        $books = Books::where(DB::raw('CAST(substr(published_date, 1, 4) AS INTEGER)'), '>=', $year)
        ->where(DB::raw('CAST(substr(published_date, 1, 4) AS INTEGER)'), '<', $limit_year)
        ->paginate(30);
        $books = $this->formatData($books);
        return view('layouts.category', compact('books'));
    }

    
}









