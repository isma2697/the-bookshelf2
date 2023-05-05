<?php

namespace App\Http\Livewire;

use App\Models\Bookmark;
use App\Models\Like;
use App\Models\Loan;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookLikesComponent extends Component
{
    // This method returns a view called "book-likes-component".
    public function render()
    {
        return view('livewire.book-likes-component');
    }

    // These are public properties that will be available to the view.
    public $likes = [];
    public $bookmarks = [];
    public $reservations = [];
    public $loans = [];
    
    // This method is called when the component is mounted, and retrieves the likes, bookmarks, reservations, and loans for the authenticated user.
    public function mount()
    {
        $userId = Auth::user()->id;
        $this->likes = Like::where('users_id', $userId)->get();
        $this->bookmarks = Bookmark::where('users_id', $userId)->get();
        $this->reservations = Reserve::where('users_id', $userId)->get();
        $this->loans = Loan::where('users_id', $userId)->get();
    }
}

