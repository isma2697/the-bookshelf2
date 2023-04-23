<?php

namespace Tests\Unit;

use Database\Seeders\BooksSeeder;
use PHPUnit\Framework\TestCase;

class BooksSeederTest extends TestCase
{
     /** @test */
     public function it_can_manipulate_published_date()
     {
         $booksSeeder = new BooksSeeder();
 
         $dateWithYearOnly = "2022";
         $dateWithYearAndMonth = "2022-05";
 
         $manipulatedDate1 = $booksSeeder->manipulatePublishedDate($dateWithYearOnly);
         $manipulatedDate2 = $booksSeeder->manipulatePublishedDate($dateWithYearAndMonth);
 
         $this->assertMatchesRegularExpression('/^2022-\d{2}-\d{2}$/', $manipulatedDate1);
         $this->assertMatchesRegularExpression('/^2022-05-\d{2}$/', $manipulatedDate2);
     }
}
