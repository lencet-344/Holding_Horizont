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
        Schema::create('farms', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("extensions");
            $table->string("location");
            $table->string("departament");
            $table->string("municipaly");
            $table->text("state");
            $table->integer("telephone")->unique();
            $table->string("address")->nullable();

            $table->integer("owner_id")->unsigned();
            $table->foreign("owner_id")->references("id")->on("owners")->onDelete("cascade")->onUpdate("cascade");

            $table->integer("property_type_id")->unsigned();
            $table->foreign("property_type_id")->references("id")->on("property_types")->onDelete("cascade")->onUpdate("cascade");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farms');
    }
};
