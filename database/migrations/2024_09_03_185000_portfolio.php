
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class Portfolio  extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->text('gender');
            $table->text('email');
            $table->string('dob');
            $table->string('education');
            $table->string('certificates')->nullable();
            $table->string('skills'); // Assuming the amount has two decimal places
            $table->string('cv')->nullable();
            $table->string('description');
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
