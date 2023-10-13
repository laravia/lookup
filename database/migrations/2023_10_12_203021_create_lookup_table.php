<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lookups', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('filter');
            $table->string('key');
            $table->string('value');
            $table->integer('sort')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lookups');
    }
};
