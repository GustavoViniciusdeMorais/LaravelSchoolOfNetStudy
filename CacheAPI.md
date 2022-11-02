# Cache API

### Route
```

http://localhost/api/courses

```

### Commands
```

php artisan db:seed --class=CourseSeeder

```

### /Users/gustavovinicius/Documents/LaravelSchoolOfNetStudy/app/Http/Controllers/API/CourseController.php
```php

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
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
}

```

### /Users/gustavovinicius/Documents/LaravelSchoolOfNetStudy/app/Services/CourseService.php
```php

class CourseService
{
    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function createCourse($data)
    {
        return $this->courseRepository->createCourse($data);
    }
}

```

### /Users/gustavovinicius/Documents/LaravelSchoolOfNetStudy/app/Repositories/CourseRepository.php
```php

class CourseRepository
{

    protected $entity;

    public function __construct(Course $course)
    {
        $this->entity = $course;
    }

    public function createCourse($data)
    {
        $data['uuid'] = Str::uuid()->toString();
        return $this->entity->create($data);
    }
}

```

### /Users/gustavovinicius/Documents/LaravelSchoolOfNetStudy/app/Http/Resources/CourseResource.php
```php

class CourseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'description' => $this->description,
            'created_at' => Carbon::make($this->created_at)->format('d/m/Y')
        ];
    }
}

```

![TDD](/imgs/API_Flow.png)
![TDD](/imgs/postCourse.png)
