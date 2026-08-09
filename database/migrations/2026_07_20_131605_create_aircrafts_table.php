<?php

use App\AircraftStatus;
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
        Schema::create('aircrafts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('type_id')
                ->constrained('types')
                ->cascadeOnDelete(); 
            
            $table->enum('status', AircraftStatus::cases()); 
            $table->string('registration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aircrafts');
    }
};
