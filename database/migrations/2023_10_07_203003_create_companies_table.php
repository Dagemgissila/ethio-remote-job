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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("company_id");
            $table->foreign("company_id")->references("id")->on("users")->onUpdate("cascade")->onDelete("cascade");
            $table->string("company_name");
            $table->string("logo");
            $table->string("description");
            $table->string("fullname");
            $table->integer("phone_number");
            $table->string("city");
            $table->string("linkdelin")->nullable();
            $table->string("facebook")->nullable();
            $table->string("telegram")->nullable();
            $table->string("tin_number");
            $table->string("license");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
