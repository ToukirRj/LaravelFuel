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
        Schema::table('orders', function (Blueprint $table) {
            $table->double("qty",8,4)->default(0);
            $table->double("price",8,4)->default(0);
            $table->double("total",14,4)->default(0);
            $table->double("paid_amount",14,4)->default(0);
            $table->double("due_amount",14,4)->default(0);
            $table->date("payment_date")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn("qty");
            $table->dropColumn("price");
            $table->dropColumn("total");
            $table->dropColumn("paid_amount");
            $table->dropColumn("due_amount");
            $table->dropColumn("payment_date");
        });
    }
};
