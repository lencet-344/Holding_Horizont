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
        Schema::create('productions', function (Blueprint $table) {
            $table->increments("id");
            $table->string("quality");
            $table->date("date_production");
            $table->text("description");

            $table->integer("harvest_id")->unsigned();
            $table->foreign("harvest_id")->references("id")->on("harvests")->onDelete("cascade")->onUpdate("cascade");

            $table->integer("crop_id")->unsigned();
            $table->foreign("crop_id")->references("id")->on("crops")->onDelete("cascade")->onUpdate("cascade");

            $table->integer("area_id")->unsigned();
            $table->foreign("area_id")->references("id")->on("areas")->onDelete("cascade")->onUpdate("cascade");

            $table->integer("crop_type_id")->unsigned();
            $table->foreign("crop_type_id")->references("id")->on("crop_types")->onDelete("cascade")->onUpdate("cascade");

            $table->integer("preparation_id")->unsigned();
            $table->foreign("preparation_id")->references("id")->on("preparations")->onDelete("cascade")->onUpdate("cascade");

            $table->integer("sowing_id")->unsigned();
            $table->foreign("sowing_id")->references("id")->on("sowings")->onDelete("cascade")->onUpdate("cascade");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};
