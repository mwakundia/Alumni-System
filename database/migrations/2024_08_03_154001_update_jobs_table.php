<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumni_jobs', function (Blueprint $table) {
            $table->renameColumn('job_name', 'job_position');
            $table->renameColumn('job_amount', 'salary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumni_jobs', function (Blueprint $table) {
            $table->renameColumn('job_position', 'job_name');
            $table->renameColumn('salary', 'job_amount');
        });
    }
}
