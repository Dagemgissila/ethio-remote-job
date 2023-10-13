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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("freelancer_id");
            $table->foreign("freelancer_id")->references("id")->on("freelancers")->onUpdate("cascade")->onDelete("cascade");
            $table->string("degree");
            $table->string("field_of_study");
            $table->date("start_date");
            $table->date("end_date")->nullable();
            $table->string("description",500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
