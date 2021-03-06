<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NotesSubjectsTopicsSubtopics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Notes', function (Blueprint $table) {

            // 1. Create new column
            $table->string('title', 255)->nullable()->after('id');
            $table->integer('topic_id')->unsigned()->nullable()->after('Message');
            $table->integer('subtopic_id')->unsigned()->nullable()->after('id');

            // 1. Create new column
            // You probably want to make the new column nullable
            // $table->integer('store_id')->unsigned()->nullable()->after('password');
            // 2. Create foreign key constraints
            // $table->foreign('store_id')->references('id')->on('stores')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('topic_id');
            $table->dropColumn('subtopic_id');


            // 1. Drop foreign key constraints
            // $table->dropForeign(['store_id']);
            // 2. Drop the column
            // $table->dropColumn('store_id');
        });
    }
}
