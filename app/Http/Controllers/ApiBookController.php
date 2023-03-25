<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiBookController extends Controller
{

    public function newjson($books){
        $customData = [];
        foreach ($books->items as $book) {
            $customData[] = [
                'title' => $book->volumeInfo->title ?? 'Unknown Title',
                'subtitle' => $book->volumeInfo->subtitle ?? null,
                'publishedDate' => $book->volumeInfo->publishedDate ?? null,
                'pageCount' => $book->volumeInfo->pageCount ?? null,
                'description' => $book->volumeInfo->description ?? null,
                'authors' => $book->volumeInfo->authors ?? null,
                'categories' => $book->volumeInfo->categories ?? null,
                'imageLinks' => $book->volumeInfo->imageLinks->thumbnail ?? null,
                'identifier' => $book->volumeInfo->industryIdentifiers[0]->identifier ?? null,
            ];
        }
        return $customData;
    }

    // this is the function that I want to use to get the books 
    public function index(){
        $client = new Client();
        $response = $client->get('https://www.googleapis.com/books/v1/volumes?q=Classics:&maxResults=40');
        $books = json_decode($response->getBody()->getContents());
        $customData = $this->newjson($books);
    
        // dd($customData);
        return $customData;
    }

    // this is the function that I want to use to get the books by category
    public function category($category){
        $client = new Client();
        $response = $client->get('https://www.googleapis.com/books/v1/volumes?q='.$category.':&maxResults=40');
        $books = json_decode($response->getBody()->getContents());
        $customData = $this->newjson($books);
    
        // dd($customData);
        return $customData;
    }
    
    
}
