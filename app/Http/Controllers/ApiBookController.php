<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiBookController extends Controller
{
    //
    public function index(){
        $client = new Client();
        $response = $client->get('https://www.googleapis.com/books/v1/volumes?q=Classics:&maxResults=40');
        $books = json_decode($response->getBody()->getContents());
        dd($books);
        
        // return view('books.index', compact('books'));
    }
}

