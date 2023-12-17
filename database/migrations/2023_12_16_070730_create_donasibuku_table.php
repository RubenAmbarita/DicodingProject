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
        Schema::create('donasibuku', function (Blueprint $table) {
            $table->id();
            $table->string('namaBuku');
            $table->string('pengarang');
            $table->integer('jumlahBuku');
            $table->string('fotoBuku');

            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')->references('id')->on('categories');

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
        Schema::dropIfExists('donasibuku');
    }
};