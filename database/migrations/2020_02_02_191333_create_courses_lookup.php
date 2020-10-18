<?php

use App\Models\V1\Course;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesLookup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_lookup', function (Blueprint $table) {
            $table->bigIncrements('sequence');
            $table->uuid('uuid');
            $table->uuid('faculty_uuid');
            $table->uuid('department_uuid');
            $table->string('name');
            $table->string('course_code');
            $table->boolean('has_pre_request')->default(false);
            $table->unsignedTinyInteger('credit_hour');

            $table->string('status')->default(Course::STATUS_ACTIVE);

            $table->timestamps();

            $table->unique('uuid');
			$table->index('status');
			$table->index('name');
			$table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_lookup');
    }
}
