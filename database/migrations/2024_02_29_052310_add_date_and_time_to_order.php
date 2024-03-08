<?php

use App\Models\Day;
use App\Models\Service;
use App\Models\Time;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignIdFor(Service::class)->constrained()->cascadeOnDelete()->nullable();
            $table->foreignIdFor(Day::class)->constrained()->cascadeOnDelete()->nullable();
            $table->foreignIdFor(Time::class)->constrained()->cascadeOnDelete()->nullable();
            $table->string("unit")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
            $table->dropForeign(['day_id']);
            $table->dropForeign(['time_id']);
            $table->dropColumn("service_id");
            $table->dropColumn("time_id");
            $table->dropColumn("day_id");
            $table->dropColumn("unit");
        });
    }
};
