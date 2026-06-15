<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('auther');
            $table->string('isbn_number');
            $table->dateTime('publish_year');
            $table->string('type')->nullable();
            $table->integer('available_books')->default(0);
            $table->unsignedBigInteger('category_id')
                  ->constrained('categories')// ou 'catalogues' selon ta table réelle
                  ->onDelete('cascade');

            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('user_id')->default(0);
            $table->string('book_picture_name')->nullable();
            $table->string('book_picture_url')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
