# Laravel Packages

### Commands
```

composer dump-autoload

php artisan make:migration create_posts --path=modules/Pages/database/migrations

php artisan tinker

$page = new \Modules\Pages\Models\Page();

$page->create(['title'=>'test','body'=>'test']);

```

### ./config/app.php
```

'providers' => [
    /*
    * Package Service Providers...
    */
    Modules\Pages\Providers\PageServiceProvider::class,
],

```

### ./modules/Pages/Providers/PageServiceProvider.php
```

namespace Modules\Pages\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class PageServiceProvider extends ServiceProvider
{

    public function boot()
    {
        Route::namespace('Modules\Pages\Http\Controllers')
            ->group(__DIR__ . '/../Routes/web.php');
        
        $this->loadViewsFrom(__DIR__ . '/../Views', 'Page');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function register()
    {

    }
}

```

### ./modules/Pages/Views/index.blade.php
```

@extends('Page::main')

@section('content')

@endsection

```

![TDD](/imgs/module.png)
