<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GoogleBooksApiTest extends TestCase
{
    /**
     * Test the Google Books API endpoint.
     *
     * @return void
     */
    public function testGoogleBooksApi()
    {
        $url = 'https://www.googleapis.com/books/v1/volumes?q=Classics:&maxResults=40';

        // Realiza una solicitud HTTP al enlace de la API
        $response = Http::get($url);

        // Verifica que la respuesta tenga un código de estado 200 (éxito)
        $this->assertEquals(200, $response->status());


        // // Convierte la respuesta JSON en una matriz
        // $responseData = $response->json();

        // // Verifica que la respuesta tenga una estructura esperada
        // $this->assertArrayHasKey('kind', $responseData);
        // $this->assertArrayHasKey('totalItems', $responseData);
        // $this->assertArrayHasKey('items', $responseData);

        // // Verifica que la respuesta contenga al menos un resultado
        // $this->assertGreaterThanOrEqual(1, count($responseData['items']));

        // // Verifica que cada elemento tenga una estructura esperada
        // foreach ($responseData['items'] as $item) {
        //     $this->assertArrayHasKey('id', $item);
        //     $this->assertArrayHasKey('volumeInfo', $item);

        //     $volumeInfo = $item['volumeInfo'];
        //     $this->assertArrayHasKey('title', $volumeInfo);
        //     $this->assertArrayHasKey('authors', $volumeInfo);
        //     $this->assertArrayHasKey('publisher', $volumeInfo);
        //     $this->assertArrayHasKey('publishedDate', $volumeInfo);
        //     $this->assertArrayHasKey('description', $volumeInfo);
        //     $this->assertArrayHasKey('pageCount', $volumeInfo);
        //     $this->assertArrayHasKey('categories', $volumeInfo);
        // }
    }
}


