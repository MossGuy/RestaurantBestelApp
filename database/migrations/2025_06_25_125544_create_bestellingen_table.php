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
        Schema::create('bestellingen', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('sessie_id')
                ->constrained('tafel_sessies', 'sessie_id')
                ->onDelete('cascade');
                
            $table->foreignId('gerecht_id')
                ->constrained('gerechten', 'gerecht_id')
                ->onDelete('cascade');

            $table->integer('tafel_nummer');
            $table->boolean('is_klaar')->default(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bestellingen');
    }
};
