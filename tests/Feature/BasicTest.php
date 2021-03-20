<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Http\Request;

use App\Http\Controllers\NoteController;

class BasicTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetHome()
    {
        $response = $this->get("/");
        $response->assertStatus(200);

        $response = $this->get("/home");
        // REDIRECT home
        $response->assertStatus(302);
    }

    public function testGetList()
    {
        $response = $this->get("/get_all_notes");
        $response->assertSee("Search");
    }

    public function testCreateNote()
    {
        $response = $this->post("/note/save", ["message" => "message"]);
        // REDIRECT to view note
        $response->assertStatus(302);
    }
}
