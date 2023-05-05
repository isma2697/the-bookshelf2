<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{

    //control permissions
    public function __construct()
    {
        $this->middleware('auth');
    }

    //What this function does is add or remove a user's bookmark
    public function toggle(Request $request, $bookId)
    {
        $user_id = auth()->id();
        $bookmark = Bookmark::where('users_id', $user_id)->where('books_id', $bookId)->first();

        if ($bookmark) {
            // Si existe un marcador, eliminarlo
            $bookmark->delete();
        } else {
            // Si no existe un marcador, crear uno nuevo
            Bookmark::create([
                'users_id' => $user_id,
                'books_id' => $bookId,
            ]);
        }
        return back();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
