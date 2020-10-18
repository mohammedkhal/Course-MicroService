<?php

namespace App\Repositories\V1\Course;

use App\Models\V1\Course;
use App\Repositories\Repository;

class CourseRepository extends Repository
{
    /**
     * Create a new course instance.
     * @return object
     */
    public function getModel()
    {
        return new Course;
    }

    /**
     * Return the list of course
     * @return App\Models\V1\Course
     */
    public function index()
    {
        $course = $this->getModel();

        $course = $course->whereStatus(Course::STATUS_ACTIVE)->get();

        return $course;
    }

    /**
     * Update an existing course
     * @return App\Models\V1\Course
     */
    public function update($data)
    {
        $course = $this->getModel();

        $course = $course->findOrFail($data['course_uuid']);

        $course->name = $data['name'];
        $course->faculty_uuid = $data['faculty_uuid'];
        $course->department_uuid = $data['department_uuid'];
        $course->number_of_hour = $data['number_of_hour'];

        $course->save();

        return $course;
    }

    /**
     * Remove an existing course
     * @return App\Models\V1\Course
     */
    public function destroy($data)
    {
        $course = $this->getModel();

        $course = $course->findOrFail($data['course_uuid'])->first();
        $course->status = Course::STATUS_INACTIVE;

        $course->save();

        return $course;
    }

    /**
     * Create one new course
     * @return App\Models\V1\Course
     */
    public function store($data)
    {
        $course = $this->getModel();

        $course->name = $data['name'];
        $course->faculty_uuid = $data['faculty_uuid'];
        $course->department_uuid = $data['department_uuid'];
        $course->number_of_hour = $data['number_of_hour'];

        $course->save();

        return $course;
    }

    /**
     * Obtains and show one course
     * @return App\Models\V1\Course
     */
    public function show($data)
    {
        $course = $this->getModel();

        $course = $course->findOrFail($data['course_uuid']);

        return $course;
    }
}
