<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
{
    Schema::create('profiles', function (Blueprint $table) {
        $table->id();
        $table->string('foto')->nullable();
        $table->string('nama');
        $table->string('no_hp');
        $table->string('jurusan');
        $table->text('deskripsi');
        $table->timestamps();
    });
}

};
