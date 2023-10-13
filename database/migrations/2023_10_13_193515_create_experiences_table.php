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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("freelancer_id");
            $table->foreign("freelancer_id")->references("id")->on("freelancers")->onUpdate("cascade")->onDelete("cascade");
            $table->string("job_position");
            $table->string("company_name");
            $table->date("start_date");
            $table->date("end_date");
            $table->string("description");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
