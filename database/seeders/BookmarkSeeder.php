<?php

namespace Database\Seeders;

use App\Models\Bookmark;
use FontLib\TrueType\Collection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $bookmark = Bookmark::factory()->make();
    
            if (!Bookmark::where('users_id', $bookmark->users_id)->where('books_id', $bookmark->books_id)->exists()) {
                $bookmark->save();
            }
        }
    }
}
