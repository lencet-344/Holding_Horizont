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
        Schema::create('insecticides', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("type_insecticide");
            $table->string("active_ingredient");
            $table->string("recomended_dose");
            $table->string("measure");
            $table->string("technical_sheel");

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
        Schema::dropIfExists('insecticides');
    }
};
