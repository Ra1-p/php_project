<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('phone_number', 15)->nullable();
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();

        //     $table->unsignedBigInteger('category_id')->nullable();

        //     $table->index('category_id', 'user_category_idx');

        //     $table->foreign('category_id', 'user_category_fk')->on('categories')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
