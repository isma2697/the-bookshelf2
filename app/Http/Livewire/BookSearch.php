<?php

namespace App\Http\Livewire;

use App\Models\Books;
use Livewire\Component;

class BookSearch extends Component
{
    // Public property used to store the search query string.
    public $search = '';

    // This method returns a view called "book-search" and passes the search results to the view.
    public function render()
    {
        // The query searches for books whose title, subtitle, or description contain the search query string.
        $books = Books::query()
            ->where('title', 'like', '%'.$this->search.'%')
            ->orWhere('subtitle', 'like', '%'.$this->search.'%')
            ->orWhere('description', 'like', '%'.$this->search.'%')
            ->get();

        // The "compact" function is used to pass the $books variable to the view.
        return view('livewire.book-search', compact('books'));
    }
}
