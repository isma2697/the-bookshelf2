<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //mostrar vista de librosde la base de datos
        $loans = Loan::all();
        // dd($reserve);
        return view('my-views.admin-loans', compact('loans'));
    }



    public function edit($loans_id)
    {
        $loan = Loan::find($loans_id);

        if (!$loan) {
            return back()->withErrors(['No se encontró el libro.']);
        }

        $loan->update([
            'due_date' => now(),
        ]);

        return back();
    }


    public function listadoPdf()
    {
        $loans = Loan::all();
        $pdf =Pdf::loadView("components.crud.Loans.listado-loans", compact('loans'));
        return $pdf->stream('listado.pdf');
    }

}
