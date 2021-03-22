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

    public function searchList()
    {
        $response = $this->post("/get_all_notes", ['title' => 'FEATURE TEST']);

        return $response;
    }

    public function testCRUD()
    {
        // Create
        $response = $this->createNote();
        // REDIRECT to view note
        $response->assertStatus(302);

        // get the new note's id
        $responseDump = $response->getContent();
        $matches = null;
        preg_match("/\/get_note\/id\/\d+/", $responseDump, $matches);
        $id = explode("/", $matches[0])[3];

        // Read
        $response = $this->readNote($id);
        $response->assertStatus(200);
        $response->assertSee("FEATURE TEST");

        // Search (Read)
        $response = $this->searchList();
        $response->assertSee("FEATURE TEST");

        // Update
        $response = $this->updateNote($id);
        $response->assertStatus(302);
        // assert that the update worked
        $response = $this->get("/get_all_notes");
        $response->assertStatus(200);
        $response->assertSee("FEATURE TEST UPDATE");

        // Delete
        $response = $this->deleteNote($id);
        $response->assertStatus(302);
        $response = $this->get("/get_all_notes");
        $response->assertStatus(200);
        $response->assertDontSee("FEATURE TEST");
    }

    public function createNote()
    {
        $response = $this->post("/note/save", [
			"title"	  => "FEATURE TEST",
			"message" => "FEATURE TEST",
		]);

        return $response;
    }

    public function readNote($id)
    {
        $response = $this->get("/get_note/id/".$id);

        return $response;
    }

    public function updateNote($id)
    {
        $response = $this->post("/note/save_edit", [
			"note_id" => $id,
			"title"	  => "FEATURE TEST UPDATE",
			"message" => "FEATURE TEST UPDATE",
		]);

        return $response;
    }

    public function deleteNote($id)
    {
        $response = $this->get("/delete_note/id/".$id);

        return $response;
    }
}
