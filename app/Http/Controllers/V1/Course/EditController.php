<?php

namespace App\Http\Controllers\V1\Course;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\V1\Course\CourseService;

class EditController extends Controller
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
     * Update an existing course
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $course_uuid)
    {
        $rules = [
            'name' => 'required|max:100',
            'faculty_uuid' => 'required|uuid',
            'department_uuid' => 'required|uuid',
            'number_of_hour' => 'required|integer|max:99',
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $data['course_uuid'] = $course_uuid;

        $course = $this->courseService->update($data);

        if ($course->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->successResponse($course);
    }

    /**
     * Remove an existing course
     * @return Illuminate\Http\Response
     */
    public function destroy($course_uuid)
    {
        $data['course_uuid'] = $course_uuid;

        $course = $this->courseService->destroy($data);

        return $this->successResponse($course);
    }
}
