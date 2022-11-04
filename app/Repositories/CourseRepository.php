<?php

namespace App\Repositories;

use App\Models\Course;
use Illuminate\Support\Str;

class CourseRepository
{

    protected $entity;

    public function __construct(Course $course)
    {
        $this->entity = $course;
    }

    public function getAllCourses()
    {
        return $this->entity->with(['modules'])->orderBy('created_at', 'desc')->get();
    }

    public function createCourse($data)
    {
        $data['uuid'] = Str::uuid()->toString();
        return $this->entity->create($data);
    }

    public function getCourseByUid($identify)
    {
        return $this->entity->with(['modules'])->where('uuid', $identify)->firstOrFail();
    }

    public function deleteCourseByIdentify($identify)
    {
        $course = $this->getCourseByUid($identify);

        if ($course) {
            $course->delete();
        }

        return $course;
    }

    public function updateCourseByUid($identify, $data)
    {
        $course = $this->getCourseByUid($identify);

        if ($course) {
            $course->update($data);
        }

        return $course;
    }
}
