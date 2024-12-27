<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumsTable extends Migration
{
    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('title'); // Kolom untuk judul forum
            $table->text('description'); // Kolom untuk deskripsi forum
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ID user pembuat forum
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('forums');
    }
}
