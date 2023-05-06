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
        Schema::create('jobrequest', function (Blueprint $table) {
            $table->id();
            $table->string("job_title");
            $table->string("amount");
            $table->string("job_description")->nullable();
            $table->string("job_qualification")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobrequests');
    }
};
