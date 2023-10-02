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
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lokasi');
            $table->date('waktu_mulai');
            $table->date('waktu_selesai');
            $table->integer('total_pekerja');
            $table->unsignedBigInteger('nama_mandor');
            $table->double('nilai_project');
            $table->string('foto')->nullable();
            $table->enum('status', ['Belum Selesai', 'Selesai']);
            $table->timestamps();
            $table->foreign('nama_mandor')->references('id')->on('pekerja')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project');
    }
};
