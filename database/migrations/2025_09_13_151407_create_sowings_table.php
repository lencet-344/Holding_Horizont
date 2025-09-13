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
        Schema::create('sowings', function (Blueprint $table) {
            $table->increments("id");
            $table->string("crap_type");
            $table->date("sowing_date");
            $table->string("area_sown");
            $table->integer("seed_amount");
            $table->string("status", 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sowings');
    }
};
