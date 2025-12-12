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
        Schema::create('ingatlanok', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategoria_id')
                  ->constrained('kategoriak')
                  ->cascadeOnDelete();
            $table->string('cim');
            $table->integer('ar');
            $table->integer('terulet');
            $table->boolean('tehermentes')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingatlanok');
    }
};
