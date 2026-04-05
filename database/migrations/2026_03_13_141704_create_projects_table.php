<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->string('reference')->unique();
            $table->string('type');
            $table->enum('status', [
                'pending',     
                'accepted',     
                'rejected',     
                'in_progress',  
                'completed',    
                'archived'      
            ])->default('pending');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('total_progress')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
