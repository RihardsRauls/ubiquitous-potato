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
/*         Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('company_name');
            $table->decimal('salary', 10, 2)->nullable();
            
            
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('job_category_id')->constrained('job_categories')->onDelete('cascade');
            $table->foreignId('employment_type_id')->constrained('employment_types')->onDelete('cascade');

            $table->timestamps();
        }); */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
