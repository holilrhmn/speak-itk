<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('subjek');
            $table->longText('laporan');
            $table->unsignedBigInteger('kategori_id');
            $table->string('lampiran')->nullable();
            $table->enum('pilihan', ['Anonim','nama']);
            $table->boolean('ditinjau')->default(false);
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('unit_id');
            $table->string('rating')->nullable();
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('categories')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('CASCADE');
            $table->foreign('unit_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
