# Location Package

### ./modules/Location/Providers/LocationServiceProvider.php
```

public function boot()
{
    Route::middleware(['web'])
        ->group(__DIR__ . '/../Routes/web.php');
    
    $this->loadTranslationsFrom(__DIR__ . '/../lang', 'Location');
}

```

### ./modules/Pages/Views/index.blade.php
```

<strong>{{ trans('Location::pages.title') . ' test' }}</strong>

```

### ./config/app.php
```

'providers' => [
    /*
    * Package Service Providers...
    */
    Modules\Pages\Providers\PageServiceProvider::class,
    Modules\Location\Providers\LocationServiceProvider::class,
],

```

### ./app/Http/Kernel.php
```

protected $middlewareGroups = [
    'web' => [
        \Modules\Location\Http\Middleware\Locale::class,
    ],
];

```

![TDD](/imgs/locationPack.png)
