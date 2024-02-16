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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique(); //["Basic Plan","Standard Plan","Premium Plan"]
            $table->string("slug")->nullable();
            $table->double("price",12,2);
            $table->string("type")->nullable(); //["Per Month","Half Yearly","Per Year"]
            $table->unsignedInteger("validity")->default(1); //["30","180","365"]
            $table->string("image")->nullable();
            $table->longText("details")->nullable();
            $table->boolean("status")->default(1);
            $table->unsignedInteger("sort_index")->nullable();
            $table->unsignedInteger("is_popular")->nullable();
            $table->string("stripe_plan_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
