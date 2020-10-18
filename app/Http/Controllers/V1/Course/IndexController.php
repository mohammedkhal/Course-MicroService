<?php

namespace App\Http\Controllers\V1\Course;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Services\V1\Course\CourseService;

class IndexController extends Controller
{
    use ApiResponser;

    private $courseService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    /**
     * Return the list of courses
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $courses = $this->courseService->index();

        return $this->successResponse($courses);
    }

    /**
     * Obtains and show one course
     * @return Illuminate\Http\Response
     */
    public function show($course_uuid)
    {
        $data['course_uuid'] = $course_uuid;
        $course = $this->courseService->show($data);

        return $this->successResponse($course);
    }
}
