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
        return $this->entity->get();
    }

    public function createCourse($data)
    {
        $data['uuid'] = Str::uuid()->toString();
        return $this->entity->create($data);
    }
}
