<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Models\Users;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware(function ($request, $next) {
        //     $user = auth()->user();
        //     if ($user && $user->is_admin != true) {
        //         $user->is_admin = true;
        //         $user->save();
        //     }
        //     return $next($request);
        // });
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = Users::all();
        return view('layouts.admin-users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('components.crud.Users.create-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Define las reglas de validación para cada campo del formulario
        $rules = [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'dni' => 'required|string|max:9|unique:users',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'is_admin' => '',
        ];

        // Realiza la validación de los datos de la solicitud
        $datos = $request->validate($rules);

        // dd($datos);
       
        unset($datos['_token']);
        if (array_key_exists('is_admin', $datos)) {
            $datos['is_admin'] = boolval($datos['is_admin']);
        } else {
            $datos['is_admin'] = false; // Por defecto, no es administrador
        }
        // dd($datos);
        Users::create($datos);
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $user = Users::find($id);
        return view('components.crud.Users.edit-user', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $user = Users::find($id);
        unset($request['_token']);
        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'dni' => $request->dni,
            'phone' => $request->phone,
            'email' => $request->email,
            'is_admin' => $request->has('is_admin') ? 1 : 0,
        ]);
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Users::find($id);
        $usuario->delete();
    }

    public function listadoPdf(){
        $users = Users::all();
        $pdf =Pdf::loadView("components.crud.Users.listado-users", compact('users'));
        return $pdf->stream('listado.pdf');
    }
}
