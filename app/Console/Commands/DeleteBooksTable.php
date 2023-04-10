<?php
namespace App\Console\Commands;

use App\Models\Books;
use Illuminate\Console\Command;

class DeleteBooksTable extends Command
{
    protected $signature = 'books:delete';

    protected $description = 'Eliminar registros de la tabla books con título o thumbnail en NULL';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Elimina los registros de la tabla books donde title o thumbnail sea NULL o si esta vacio
        $deleted = Books::whereNull('title')
            ->orWhereNull('thumbnail')
            ->orWhereNull('description')
            ->orWhereNull('authors')    
            ->orWhereNull('subtitle')
            ->orWhereNull('published_date')
            ->orWhereNull('page_count')
            ->orWhereNull('categories')
            ->orWhereNull('identifier')
            ->delete();

        $this->info("{$deleted} registros eliminados de la tabla books");
    }
}
