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
        Schema::create('areas', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("location");
            $table->text("description");

            $table->integer("farm_id")->unsigned();
            $table->foreign("farm_id")->references("id")->on("farms")->onDelete("cascade")->onUpdate("cascade");

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
        Schema::dropIfExists('areas');
    }
};
