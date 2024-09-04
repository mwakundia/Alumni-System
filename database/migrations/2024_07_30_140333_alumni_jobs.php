
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class AlumniJobs  extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('alumni_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('job_type');
            $table->text('job_description');
            $table->text('job_qualification');
            $table->string('job_location');
            $table->string('job_name');
            $table->string('job_duration');
            $table->decimal('job_amount', 8, 2); // Assuming the amount has two decimal places
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('alumni_jobs');
    }
}
