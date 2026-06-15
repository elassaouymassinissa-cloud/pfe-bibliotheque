<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowedBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowed_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(0);
            $table->unsignedBigInteger('book_id')->default(0);
            $table->dateTime('borrow_date');
            $table->dateTime('return_date')->nullable();
            $table->decimal('fine_amount')->default(0.00);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('Book_id');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');

            $table->boolean('is_notified')->default(false);
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
        Schema::dropIfExists('borrowed_books');
    }
}
