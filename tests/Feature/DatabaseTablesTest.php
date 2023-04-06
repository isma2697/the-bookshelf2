<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

class DatabaseTablesTest extends TestCase
{
    use RefreshDatabase;

    public function test_required_tables_exist()
    {
        $this->assertDatabaseHasTable('users');
        $this->assertDatabaseHasTable('books');
        $this->assertDatabaseHasTable('comentarios');
        $this->assertDatabaseHasTable('likes');
        $this->assertDatabaseHasTable('reservas');
    }

    public function assertDatabaseHasTable(string $table)
    {
        $this->assertTrue(Schema::hasTable($table), "La tabla [{$table}] no existe en la base de datos.");
    }
}
