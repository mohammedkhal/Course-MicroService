<?php

namespace App\Http\Controllers\V1\Course;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\V1\Course\courseService;

class CreateController extends Controller
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
     * Create one new course
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'faculty_uuid' => 'required|uuid',
            'department_uuid' => 'required|uuid',
            'number_of_hour' => 'required|integer|max:99',
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $lecturer = $this->CourseService->store($data);

        return $this->successResponse($lecturer, Response::HTTP_CREATED);
    }
}
