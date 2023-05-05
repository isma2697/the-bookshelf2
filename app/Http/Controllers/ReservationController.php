<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Reserve;
use Barryvdh\DomPDF\Facade\Pdf;

class ReservationController extends Controller
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
        })->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'listadoPdf', 'confirmReservation']);
    }


    //The "toggle" function creates or deletes a book reservation for an authenticated user and redirects the user to the previous page.
    public function toggle($bookId)
    {
        $user_id = auth()->id();
        $book = Books::find($bookId);
        if (!$book) {
            return back()->withErrors(['No se encontró el libro.']);
        }
        
        $reserved = Reserve::where('users_id', $user_id)->where('books_id', $bookId)->first();
        if ($reserved) {
            $reserved->delete();
        } else {
            $fecha_reserva = Carbon::now();
            $fecha_vencimiento = Carbon::now()->addDays(7);
            Reserve::create([
                'users_id' => $user_id,
                'books_id' => $bookId,
                'fecha_reserva' => $fecha_reserva,
                'fecha_vencimiento' => $fecha_vencimiento,
            ]);  
        }
        return back();
    }

    public function index()
    {
        //mostrar vista de librosde la base de datos
        $reservations = Reserve::all();
        // dd($reserve);
        return view('my-views.admin-reserve', compact('reservations'));
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    //this function is confirmation of the reservation and the creation of the loan.
    public function confirmReservation($reservationId)
    {
        $reservation = Reserve::find($reservationId);
        if (!$reservation) {
            return back()->withErrors(['No se encontró la reserva.']);
        }
    
        $user_id = $reservation->users_id;
        $book_id = $reservation->books_id;
        $book = Books::find($book_id);
        
        if (!$book) {
            return back()->withErrors(['No se encontró el libro.']);
        }
    
        Loan::create([
            'users_id' => $user_id,
            'books_id' => $book_id,
            'loan_date' => Carbon::now(),
            'return_date' => Carbon::now()->addDays(14),
        ]);
    
        // Delete the reservation after creating the loan
        $reservation->delete();
        return back()->with('success', 'La reserva ha sido confirmada y se ha creado un préstamo.');
    }
    
    // function to display in pdf a record of all the books in the database
    public function listadoPdf(){
        $reservations = Reserve::all();
        $pdf =Pdf::loadView("components.crud.Reservations.listado-reserve", compact('reservations'));
        return $pdf->stream('listado.pdf');
    }



}
