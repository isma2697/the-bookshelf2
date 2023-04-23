<?php

namespace Tests\Unit;

use App\Http\Controllers\BooksController;
use App\Models\Books;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use ReflectionMethod;

class BooksControllerTest extends TestCase
{
    /** @test */
    public function it_formats_data_correctly()
    {
        $books = collect([
            new Books([
                'authors' => json_encode(['Author 1', 'Author 2']),
                'categories' => json_encode(['Category 1', 'Category 2'])
            ])
        ]);

        $booksController = new BooksController();

        // Hacer accesible el método formatData() utilizando la reflexión
        $formatDataMethod = new ReflectionMethod(BooksController::class, 'formatData');
        $formatDataMethod->setAccessible(true);

        // Llamar al método formatData() con la reflexión
        $formattedBooks = $formatDataMethod->invoke($booksController, $books);

        $this->assertEquals('Author 1, Author 2', $formattedBooks[0]->authors);
        $this->assertEquals('Category 1, Category 2', $formattedBooks[0]->categories);
    }
}
