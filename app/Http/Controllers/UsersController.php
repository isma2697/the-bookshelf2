<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Models\Users;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class UsersController extends Controller
{
    
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
    public function store(StoreUsersRequest $request)
    {
        //
        $usuario = new Users();
        $usuario->name = $request->name;
        $usuario->surname = $request->surname;
        $usuario->phone = $request->phone;
        $usuario->dni = $request->dni;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->save();
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
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersRequest $request, Users $users)
    {
        //
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
