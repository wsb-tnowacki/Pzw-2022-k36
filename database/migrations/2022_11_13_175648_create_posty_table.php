<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posty', function (Blueprint $table) {
            $table->id();
            $table->string('tytul', 200);
            $table->string('autor', 100);
            $table->string('email', 200);
            $table->text('tresc');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            //relacje
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('update_user_id');
            //relacje
            $table->foreign('update_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posty');
    }
};
