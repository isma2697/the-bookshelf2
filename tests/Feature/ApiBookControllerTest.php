<?php

namespace Tests\Feature;

use App\Http\Controllers\ApiBookController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiBookControllerTest extends TestCase
{
    /** @test */
    public function it_can_fetch_books_using_index_method()
    {
        $apiBookController = new ApiBookController();
        $booksData = $apiBookController->index();

        $this->assertIsArray($booksData);
        $this->assertNotEmpty($booksData);

        $book = $booksData[0];

        $this->assertArrayHasKey('title', $book);
        $this->assertArrayHasKey('subtitle', $book);
        $this->assertArrayHasKey('publishedDate', $book);
        $this->assertArrayHasKey('pageCount', $book);
        $this->assertArrayHasKey('description', $book);
        $this->assertArrayHasKey('authors', $book);
        $this->assertArrayHasKey('categories', $book);
        $this->assertArrayHasKey('imageLinks', $book);
        $this->assertArrayHasKey('identifier', $book);
    }

    /** @test */
    public function it_can_fetch_books_by_category_using_category_method()
    {
        $apiBookController = new ApiBookController();
        $category = "Fiction";
        $booksData = $apiBookController->category($category);

        $this->assertIsArray($booksData);
        $this->assertNotEmpty($booksData);

        $book = $booksData[0];

        $this->assertArrayHasKey('title', $book);
        $this->assertArrayHasKey('subtitle', $book);
        $this->assertArrayHasKey('publishedDate', $book);
        $this->assertArrayHasKey('pageCount', $book);
        $this->assertArrayHasKey('description', $book);
        $this->assertArrayHasKey('authors', $book);
        $this->assertArrayHasKey('categories', $book);
        $this->assertArrayHasKey('imageLinks', $book);
        $this->assertArrayHasKey('identifier', $book);
    }
}
