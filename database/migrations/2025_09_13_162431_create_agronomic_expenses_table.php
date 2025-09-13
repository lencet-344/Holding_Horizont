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
        Schema::create('agronomic_expenses', function (Blueprint $table) {
            $table->increments("id");
            $table->string("expense_type");
            $table->text("description");

            $table->integer("preparation_id")->unsigned();
            $table->foreign("preparation_id")->references("id")->on("preparations")->onDelete("cascade")->onUpdate("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agronomic_expenses');
    }
};
