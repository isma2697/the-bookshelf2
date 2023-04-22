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
        $this->middleware('auth');
    }


    //
    public function toggle($bookId)
    {
        $user_id = auth()->id();
        $book = Books::find($bookId);


        // dd($book);
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
    
        // Elimina la reserva después de crear el préstamo
        $reservation->delete();
    
        return back()->with('success', 'La reserva ha sido confirmada y se ha creado un préstamo.');
    }
    

    public function listadoPdf(){
        $reservations = Reserve::all();
        $pdf =Pdf::loadView("components.crud.Reservations.listado-reserve", compact('reservations'));
        return $pdf->stream('listado.pdf');
    }



}
