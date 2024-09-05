<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('name');
            $table->string('placeofbirth');
            $table->string('address');
            $table->string('dateofbirth');
            $table->string('gender');
            $table->string('gol');
            $table->string('eselon');
            $table->string('position');
            $table->string('placeoftask');
            $table->string('religion');
            $table->string('workunit');
            $table->string('nohp');
            $table->string('npwp');
            $table->timestamps();

         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
