<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Controllers\ApiBookController;
use App\Models\Books;

class BooksSeeder extends Seeder
{


    public function dataCreate($booksData){
        foreach ($booksData as $bookData) {
            Books::create([
                'title' => $bookData['title'],
                'subtitle' => $bookData['subtitle'],
                'published_date' => $bookData['publishedDate'],
                'page_count' => $bookData['pageCount'],
                'description' => $bookData['description'],
                'authors' => json_encode($bookData['authors']),
                'categories' => json_encode($bookData['categories']),
                'thumbnail' => $bookData['imageLinks'],
                'identifier' => $bookData['identifier']
            ]);
        }
    }

    public function createBooksByCategory($category)
    {
        $apiBookController = new ApiBookController();
        $booksCategoryData = $apiBookController->category($category);
        $this->dataCreate($booksCategoryData);
    }

    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $apiBookController = new ApiBookController();
        $booksData = $apiBookController->index();
        $this->dataCreate($booksData);
        

        // Define la lista de categorías
        $categories = [
            'Art',
            'Biographies & Autobiographies',
            'Business & Economics',
            "Children's Books",
            'Classics',
            'Comics & Graphic Novels',
            'Computers & Internet',
            'Cooking',
            'Education',
            'Entertainment',
            'Fiction & Literature',
            'Health, Mind & Body',
            'History',
            'Home & Garden',
            'Horror',
            'Humor',
            'Foreign Language Study',
            'Young Adult Fiction',
            'Law',
            'LGBT',
            'Literary Collections',
            'Mathematics',
            'Medical',
            'Mystery & Detective',
            'Nonfiction',
            'Poetry',
            'Political Science',
            'Psychology',
            'Religion & Spirituality',
            'Science',
            'Science Fiction & Fantasy',
            'Self-Help',
            'Sports & Outdoors',
            'Study Aids',
            'Travel'
        ];
        // Crea los libros para cada categoría
        foreach ($categories as $category) {
            $this->createBooksByCategory($category);
        }


    }

    
}

