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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("last_name");
            $table->integer("age");
            $table->string("gender");
            $table->string("email")->unique()->nullable();
            $table->integer("telephone")->unique();

            $table->integer("sale_id")->unsigned();
            $table->foreign("sale_id")->references("id")->on("sales")->onDelete("cascade")->onUpdate("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
