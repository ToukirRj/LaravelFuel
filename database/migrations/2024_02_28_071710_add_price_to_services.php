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
        Schema::table('services', function (Blueprint $table) {
            $table->string("short_name")->nullable();//Gas or Diesel
            $table->double("price",8,4)->default(0);
            $table->string("unit",)->default("Gallon");//(Gallon or Litre)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn("short_name");
            $table->dropColumn("price");
            $table->dropColumn("unit");
        });
    }
};
