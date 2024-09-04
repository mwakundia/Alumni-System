<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('applied_jobs', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('user_id')->constrained('alumni_jobs')->onDelete('cascade');
            $table->string('job_id');
            $table->text('fname');
            $table->text('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('applied_jobs');
    }
};
