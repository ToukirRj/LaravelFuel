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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string("title")->unique();
            $table->string("title_2")->unique();
            $table->string("slug")->nullable();
            $table->string("url")->nullable();
            $table->string("button_name")->nullable();
            $table->string("image")->nullable();
            $table->longText("details")->nullable();
            $table->boolean("status")->default(1);
            $table->unsignedInteger("sort_index")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
