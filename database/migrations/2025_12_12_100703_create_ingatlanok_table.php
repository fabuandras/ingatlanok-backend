<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ingatlanok', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kategoria_id')
                ->constrained('kategoriak')
                ->cascadeOnDelete();

            $table->text('leiras');
            $table->dateTime('datum')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('tehermentes')->default(true);
            $table->unsignedInteger('ar');
            $table->string('kepUrl');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ingatlanok');
    }
};
