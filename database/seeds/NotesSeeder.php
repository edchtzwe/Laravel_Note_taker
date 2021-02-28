<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notes = factory(App\Notes::class, 100)->create();
    }
}
