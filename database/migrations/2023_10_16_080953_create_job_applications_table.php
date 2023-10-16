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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("job_id");
            $table->foreign("job_id")->references("id")->on("jobs")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("freelancer_id");
            $table->foreign("freelancer_id")->references("id")->on("freelancers")->onDelete("cascade")->onUpdate("cascade");
            $table->string("description",1100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
