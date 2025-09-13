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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("last_name");
            $table->string("identification_card",20)->unique()->nullable();
            $table->integer("telephone")->unique();
            $table->string("email")->unique()->nullable();
            $table->string("address");
            $table->date("hire_date");


            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
