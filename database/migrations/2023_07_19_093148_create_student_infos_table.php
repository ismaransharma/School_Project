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
        Schema::create('student_infos', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->enum('class', ['1','2','3','4','5','6','7','8','9','10']);
            $table->enum('section', ['sun', 'moon', 'star']);
            $table->string('father_name');
            $table->string('father_occupation');
            $table->string('father_contact');
            $table->string('mother_name');
            $table->string('mother_occupation');
            $table->string('mother_contact');
            $table->string('permanent_district');
            $table->string('permanent_municipality');
            $table->string('permanent_ward_no');
            $table->string('permanent_tole');
            $table->string('current_district');
            $table->string('current_municipality');
            $table->string('current_ward_no');
            $table->string('current_tole');
            $table->string('slug')->unique();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_infos');
    }
};