# Config Locale

### Commands
```

php artisan make:middleware Locale

```
### ./modules/Pages/lang/en/pages.php
```

return [
    'title' => 'Page Title',
    'page' => 'Page'
];

```

### ./modules/Pages/lang/pt-br/pages.php
```

return [
    'title' => 'BR Título',
    'page' => 'Página'
];

```

### ./routes/web.php
```

Route::get('/locale/{local}', function ($locale) {
    request()->session()->put('locale', $locale);
    return redirect('/pages');
});

```

### ./app/Http/Middleware/Locale.php
```

public function handle(Request $request, Closure $next)
    {
        $locale = request()->session()->has('locale') ? request()->session()->get('locale') : false;

        if ($locale) {
            \App::setLocale($locale);
        }

        return $next($request);
    }

```

### ./modules/Pages/Providers/PageServiceProvider.php
```

public function boot()
    {
        Route::namespace('Modules\Pages\Http\Controllers')
            ->middleware(['web'])
            ->group(__DIR__ . '/../Routes/web.php');
        
        $this->loadViewsFrom(__DIR__ . '/../Views', 'Page');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

```

### ./modules/Pages/Views/index.blade.php
```

<strong>{{ trans('pages.title') }}</strong>

```

