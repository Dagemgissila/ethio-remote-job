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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("posted_by");
            $table->foreign("posted_by")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            $table->string("job_title");
            $table->string("description");
            $table->string("requirement");
            $table->string("status");
            $table->string("deadline");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
