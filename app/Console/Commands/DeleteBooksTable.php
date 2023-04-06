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
        // Elimina los registros de la tabla books donde title o thumbnail sea NULL
        $deleted = Books::whereNull('title')
            ->orWhereNull('thumbnail')
            ->delete();

        $this->info("{$deleted} registros eliminados de la tabla books");
    }
}
