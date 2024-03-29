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
        Schema::create('saldo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->double('saldo_project')->nullable();
            $table->double('piutang_pengusaha')->nullable();
            $table->json('history');
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('project')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saldo');
    }
};
