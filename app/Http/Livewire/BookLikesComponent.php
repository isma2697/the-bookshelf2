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
    public function render()
    {
        return view('livewire.book-likes-component');
    }
    public $likes = [];
    public $bookmarks = [];
    public $reservations = [];
    public $loans = [];
    
    public function mount()
    {
        $userId = Auth::user()->id;
        $this->likes = Like::where('users_id', $userId)->get();
        $this->bookmarks = Bookmark::where('users_id', $userId)->get();
        $this->reservations = Reserve::where('users_id', $userId)->get();
        $this->loans = Loan::where('users_id', $userId)->get();
     }
    



}
