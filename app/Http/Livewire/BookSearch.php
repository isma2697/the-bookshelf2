<?php

namespace App\Http\Livewire;

use App\Models\Books;
use Livewire\Component;

class BookSearch extends Component
{
    public $search = '';

    public function render()
    {
        $books = Books::query()
            ->where('title', 'like', '%'.$this->search.'%')
            ->orWhere('subtitle', 'like', '%'.$this->search.'%')
            ->orWhere('description', 'like', '%'.$this->search.'%')
            ->get();

        return view('livewire.book-search', compact('books'));
    }
}
