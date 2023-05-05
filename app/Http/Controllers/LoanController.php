<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = auth()->user();
            if ($user && $user->is_admin) {
                return $next($request); // If you are an authenticated user and administrator, continue with the request
            }
            abort(403); // If you are not an administrator, it shows a 403 unauthorized access error
        })->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'listadoPdf']);
    }

    public function index()
    {
        //show database books view
        $loans = Loan::all();
        return view('my-views.admin-loans', compact('loans'));
    }

    //function to edit an go back to the view
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

    // function to display in pdf a record of all the books in the database
    public function listadoPdf()
    {
        $loans = Loan::all();
        $pdf =Pdf::loadView("components.crud.Loans.listado-loans", compact('loans'));
        return $pdf->stream('listado.pdf');
    }

}
