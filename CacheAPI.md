# Cache API

### Route
```

http://localhost/api/courses

```

### Commands
```

php artisan db:seed --class=CourseSeeder

```

### ./app/Http/Controllers/API/CourseController.php
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

### ./app/Http/Requests/CoursesRequest.php
```php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $uuid = $this->course ?? '';

        return [
            'name' => ['required', "unique:courses,name,{$uuid},uuid"],
            'description' => 'required'
        ];
    }
}

```

### ./app/Services/CourseService.php
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

### ./app/Repositories/CourseRepository.php
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

### ./app/Http/Resources/CourseResource.php
```php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'description' => $this->description,
            'created_at' => Carbon::make($this->created_at)->format('d/m/Y'),
            'modules' => ModuleResource::collection($this->whenLoaded('modules'))
        ];
    }
}

```

![TDD](/imgs/API_Flow.png)
![TDD](/imgs/postCourse.png)
