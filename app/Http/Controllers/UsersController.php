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
        $this->middleware(function ($request, $next) {
            $user = auth()->user();
            if ($user && $user->is_admin) {
                return $next($request); // If you are an authenticated user and administrator, continue with the request
            }
            abort(403); // If you are not an administrator, it shows a 403 unauthorized access error
        })->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'listadoPdf', 'panelControl']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Users::all();
        return view('my-views.admin-users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.crud.Users.create-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Define validation rules for each form field
        $rules = [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'dni' => 'required|string|max:9|unique:users',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'is_admin' => '',
        ];

        // Performs the validation of the request data
        $datos = $request->validate($rules);
        unset($datos['_token']);
        if (array_key_exists('is_admin', $datos)) {
            $datos['is_admin'] = boolval($datos['is_admin']);
        } else {
            $datos['is_admin'] = false;
        }
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
        $user = Users::find($id);
        return view('components.crud.Users.edit-user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Define validation rules for each form field
        $rules = [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'dni' => 'required|string|max:9|unique:users,dni,'.$id,
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            'is_admin' => '',
        ];

        // Performs the validation of the request data
        $datos = $request->validate($rules);

        // Find the user to update
        $user = Users::find($id);

        if (array_key_exists('is_admin', $datos)) {
            $datos['is_admin'] = boolval($datos['is_admin']);
        } else {
            $datos['is_admin'] = false; // By default, it is not an administrator
        }

        // Update user data
        $user->update([
            'name' => $datos['name'],
            'surname' => $datos['surname'],
            'dni' => $datos['dni'],
            'phone' => $datos['phone'],
            'email' => $datos['email'],
            'is_admin' => boolval($datos['is_admin']),
        ]);

        // Redirect user to user list
        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Users::find($id);
        $usuario->delete();
    }

    public function panelControl(){
        // This function returns a view called "panel-control".
        return view('my-views.panel-control');
    }
    
    public function listadoPdf(){
        // This function loads all users and generates a PDF file with them using a view called "listado-users".
        $users = Users::all();
        $pdf = Pdf::loadView("components.crud.Users.listado-users", compact('users'));
        // The generated PDF is streamed and returned with the filename "listado.pdf".
        return $pdf->stream('listado.pdf');
    }
    
    public function sections($section = null)
    {
        // This function returns a view called "panel-user" and passes in a variable called "section", which may be null or contain a value.
        return view('my-views.panel-user', compact('section'));
    }
    

}
