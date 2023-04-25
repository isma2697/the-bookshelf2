<?php

namespace App\Http\Controllers;
use App\Models\Books;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{   
    public function __construct()
    {
        // $this->middleware('auth')->only(['function1', 'function2', 'function3']);
        $this->middleware(function ($request, $next) {
            $user = auth()->user();
            if ($user && $user->is_admin) {
                return $next($request); // Si es un usuario autenticado y administrador, continúa con la solicitud
            }
            abort(403); // Si no es administrador, muestra un error 403 de acceso no autorizado
        })->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'listadoPdf']);
    }

 
    
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
        return view('my-views.admin-books', compact('books'));
    }

   public function popular(){
    $books = Books::leftJoin('likes', 'books.id', '=', 'likes.books_id')
                ->select('books.*', DB::raw('COUNT(likes.id) as likes_count'))
                ->groupBy('books.id')
                ->orderBy('likes_count', 'DESC')
                ->paginate(45);

    $books = $this->formatData($books);
    // dd($books);
    return view('my-views.most-popular', compact('books'));
}

    

    public function principal(){
        $books = Books::paginate(40);
        $books = $this->formatData($books);
        return view('my-views.principal', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = [
            'Art', 'Biographies & Autobiographies', 'Business & Economics', "Children's Books", 'Classics', 'Comics & Graphic Novels', 'Computers & Internet', 'Cooking', 'Education', 'Entertainment', 'Fiction & Literature', 'Health, Mind & Body', 'History', 'Home & Garden', 'Horror', 'Humor', 'Foreign Language Study', 'Young Adult Fiction', 'Law', 'LGBT', 'Literary Collections', 'Mathematics', 'Medical', 'Mystery & Detective', 'Nonfiction', 'Poetry', 'Political Science', 'Psychology', 'Religion & Spirituality', 'Science', 'Science Fiction & Fantasy', 'Self-Help', 'Sports & Outdoors', 'Study Aids', 'Travel'
        ];
        return view('components.crud.Books.create-book', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $rules = [
            'title'          => 'required|string|max:255',
            'subtitle'       => 'required|string|max:255',
            'authors'        => 'required|string|max:255',
            'description'    => 'required|string|max:1000',
            'categories'     => 'required',
            'published_date' => 'required|date',
            'page_count'     => 'required|string|numeric',
            'thumbnail'      => 'required|string|max:255',
            'identifier'     => 'required|string|max:255',
        ];

        // Realiza la validación de los datos de la solicitud
        $datos = $request->validate($rules);

        //
        
        $selectedCategories = implode(',', $request->input('categories', []));

        $datos = $request->all();
        //quitar el token para que no de error
        unset($datos['_token']);
        $book = new Books;
        $book->title = $request->input('title');
        $book->subtitle = $request->input('subtitle');
        $book->authors = json_encode($request->input('authors'));
        $book->description = $request->input('description');
        $book->categories = json_encode($selectedCategories);
        $book->published_date = $request->input('published_date');
        $book->page_count = $request->input('page_count');
        $book->thumbnail = $request->input('thumbnail');
        $book->identifier = $request->input('identifier');
        $book->save();
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
        $comments = Comentario::where('books_id', $id)->with('users')->get();

        foreach ($comments as $comment) {
            $comment->users_id = $comment->users->name;
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
            return view('my-views.only-book', compact('book', 'books', 'comments'));
        } else {
            abort(404);
        }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = [
            'Art', 'Biographies & Autobiographies', 'Business & Economics', "Children's Books", 'Classics', 'Comics & Graphic Novels', 'Computers & Internet', 'Cooking', 'Education', 'Entertainment', 'Fiction & Literature', 'Health, Mind & Body', 'History', 'Home & Garden', 'Horror', 'Humor', 'Foreign Language Study', 'Young Adult Fiction', 'Law', 'LGBT', 'Literary Collections', 'Mathematics', 'Medical', 'Mystery & Detective', 'Nonfiction', 'Poetry', 'Political Science', 'Psychology', 'Religion & Spirituality', 'Science', 'Science Fiction & Fantasy', 'Self-Help', 'Sports & Outdoors', 'Study Aids', 'Travel'
        ];
        $book = Books::find($id);
        return view('components.crud.Books.edit-book', compact('book' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $rules = [
        'title'          => 'required|string|max:255',
        'subtitle'       => 'required|string|max:255',
        'authors'        => 'required|string|max:255',
        'description'    => 'required|string|max:1000',
        'categories'     => 'required',
        'published_date' => 'required|date',
        'page_count'     => 'required|string|numeric',
        'thumbnail'      => 'required|string|max:255',
        'identifier'     => 'required|string|max:255',
    ];

    // Realiza la validación de los datos de la solicitud
    $datos = $request->validate($rules);

    // Obtiene las categorías seleccionadas y las convierte en una cadena separada por comas
    $selectedCategories = implode(',', $request->input('categories', []));

    // Obtiene todos los datos de la solicitud
    $datos = $request->all();
    // Elimina el token para evitar errores
    unset($datos['_token']);

    // Encuentra el libro en la base de datos y actualiza los campos
    $book = Books::find($id);
    $book->title = $request->input('title');
    $book->subtitle = $request->input('subtitle');
    $book->authors = $request->input('authors');
    $book->description = $request->input('description');
    $book->categories = json_encode($selectedCategories);
    $book->published_date = $request->input('published_date');
    $book->page_count = $request->input('page_count');
    $book->thumbnail = $request->input('thumbnail');
    $book->identifier = $request->input('identifier');
    $book->save();

    // Redirige al usuario a la página de administración de libros
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
        return view('my-views.category', compact('books'));
    }

    public function show_years($year)
    {
        $year = (int) $year;
        $limit_year = $year + 20;
        $books = Books::where(DB::raw('CAST(substr(published_date, 1, 4) AS INTEGER)'), '>=', $year)
        ->where(DB::raw('CAST(substr(published_date, 1, 4) AS INTEGER)'), '<', $limit_year)
        ->paginate(30);
        $books = $this->formatData($books);
        return view('my-views.category', compact('books'));
    }
}









