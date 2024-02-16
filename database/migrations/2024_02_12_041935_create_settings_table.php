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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("logo")->nullable();
            $table->string("icon")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->string("address")->nullable();
            $table->longText("short_description")->nullable();
            $table->longText("header_script")->nullable();
            $table->longText("footer_script")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
