# Modularizaton

### Laravel
```

chmod +x composer.sh
./composer.sh

composer create-project laravel/laravel:^5.8 appname

```

### Postgres
```
psql -d postgres -U postgres
\l # list databases
\c # connect to database
\dt # show tables
\d table # describe table
select * from customers;
```

### Commands
```

composer require nwidart/laravel-modules

php artisan vendor:publish --provider="Nwidart\Modules\LaravelModulesServiceProvider"

php artisan module:make Blog

php artisan module:make-migration create_posts Blog

php artisan module:make-model Post Blog

php artisan serve --host=0.0.0.0 --port=80

```

### ./Modules/Blog/Routes/web.php
```

Route::prefix('blog')->group(function() {
    Route::get('/', 'BlogController@index');
    Route::get('/test', 'BlogController@test');
});

```

### Controller
```

class BlogController extends Controller
{

    public function test()
    {
        return response()->json('Test');
    }
}

```
![TDD](/imgs/moduleList.png)