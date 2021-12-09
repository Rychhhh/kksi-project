<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_credentials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('description')->nullable();
            $table->enum('gender', ['p', 'l'])->nullable();
            $table->string('academy')->nullable();
            $table->string('mobile')->nullable();
            $table->string('location')->nullable();
            $table->string('fb_acc')->nullable();
            $table->string('ig_acc')->nullable();
            $table->string('twit_acc')->nullable();
            $table->string('git_acc')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_credentials');
    }
}
