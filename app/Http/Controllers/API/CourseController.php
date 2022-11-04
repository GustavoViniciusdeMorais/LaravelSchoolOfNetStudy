<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CourseService;
use App\Http\Resources\CourseResource;
use App\Http\Requests\CoursesRequest;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = $this->courseService->getCourses();

        return CourseResource::collection($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoursesRequest $request)
    {
        $course = $this->courseService->createCourse($request->all());

        return new CourseResource($course);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $courses = $this->courseService->getCourseByUid($identify);

        return new CourseResource($courses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function update(CoursesRequest $request, $identify)
    {
        $courses = $this->courseService->updateCourseByUid($identify, $request->all());

        return new CourseResource($courses);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function destroy($identify)
    {
        $courses = $this->courseService->deleteCourseByIdentify($identify);

        return new CourseResource($courses);
    }
}
