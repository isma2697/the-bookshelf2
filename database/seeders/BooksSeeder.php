<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Controllers\ApiBookController;
use App\Models\Books;

class BooksSeeder extends Seeder
{

    private function manipulatePublishedDate($publishedDate)
    {
        if (strlen($publishedDate) == 4) {
            // genera una fecha aleatoria en el formato yyyy-mm-dd
            $month = rand(1, 12);
            $day = rand(1, 28);
            $publishedDate = $publishedDate . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);
        } elseif (strlen($publishedDate) == 7) {
            // genera un día aleatorio en el formato yyyy-mm-dd
            $day = rand(1, 28);
            $publishedDate = $publishedDate . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);
        }

        return $publishedDate;
    }

    public function dataCreate($booksData)
    {
        foreach ($booksData as $bookData) {
            // busca un registro existente por título
            $existingBook = Books::where('title', $bookData['title'])->first();

            
            
            
            if (!$existingBook && !is_null($bookData['title']) && !is_null($bookData['subtitle']) && !is_null($bookData['publishedDate']) && !is_null($bookData['pageCount']) && !is_null($bookData['description']) && !is_null($bookData['authors']) && !is_null($bookData['categories']) && !is_null($bookData['imageLinks']) && !is_null($bookData['identifier'])) {
                // manipula la fecha
                $publishedDate = $this->manipulatePublishedDate($bookData['publishedDate']);
                // crea un nuevo registro
                Books::create([
                    'title' => $bookData['title'],
                    'subtitle' => $bookData['subtitle'],
                    'published_date' => $publishedDate,
                    'page_count' => $bookData['pageCount'],
                    'description' => $bookData['description'],
                    'authors' => json_encode($bookData['authors']),
                    'categories' => json_encode($bookData['categories']),
                    'thumbnail' => $bookData['imageLinks'],
                    'identifier' => $bookData['identifier']
                ]);
            }
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

