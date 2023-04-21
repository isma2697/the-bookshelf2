<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Books;
use Illuminate\Http\Request;

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

        if (!$book) {
            return back()->withErrors(['No se encontró el libro.']);
        }

        $reserved = $book->reserves->contains('users_id', $user_id);

        if ($reserved) {
            $book->reserves()->where('users_id', $user_id)->delete();
        } else {
            $fecha_reserva = Carbon::now();
            $fecha_vencimiento = Carbon::now()->addDays(14);

            $book->reserves()->create([
                'users_id' => $user_id,
                'reserved_at' => $fecha_reserva,
                'fecha_reserva' => $fecha_reserva,
                'fecha_vencimiento' => $fecha_vencimiento,
            ]);
        }

        return back();
    }


}
