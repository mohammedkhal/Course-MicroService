<?php

namespace App\Services\V1\Course;

use App\Repositories\V1\Course\courseRepository;

class CourseService
{
    private $courseRepository;

    /**
     * Create a new Repository instance.
     * @return void
     */
    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    /**
     * Return the list of courses
     * @return App\Models\V1\Course
     */
    public function index()
    {
        return $this->courseRepository->index();
    }

    /**
     * Update an existing course
     * @return App\Models\V1\Course
     */
    public function update($data)
    {
        return $this->courseRepository->update($data);
    }

    /**
     * Remove an existing course
     * @return App\Models\V1\Course
     */
    public function destroy($data)
    {
        return $this->courseRepository->destroy($data);
    }

    /**
     * Create one new course
     * @return App\Models\V1\Course
     */
    public function store($data)
    {
        return $this->courseRepository->store($data);
    }

    /**
     * Obtains and show one course
     * @return App\Models\V1\Course
     */
    public function show($data)
    {
        return $this->courseRepository->show($data);
    }
}
