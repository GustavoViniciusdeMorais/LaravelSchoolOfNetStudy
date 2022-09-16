# Access Control

```

composer require laravel/jetstream:^2.9

touch .env.example

chmod -R 777 .env.example

php artisan jetstream:install livewire

apk add --update nodejs npm

npm install

npm run dev

php artisan migrate

```

### Models

```

php artisan make:model Role -m

php artisan make:model Permission -m

php artisan make:model RolePermission -m

php artisan make:model UserRoles -m

php artisan make:seeder RolesSeeder

php artisan make:seeder PermissionsSeeder

php artisan make:seeder RolePermissionsSeeder

php artisan make:seeder UserRolesSeeder

```

### Tinker

```

use App\Models\UserRole;

UserRole::where('id',5)->update(['user_id'=>2]);

```

### app/Providers/AuthServiceProvider.php

```php

use Illuminate\Support\Facades\Gate;

public function boot()
{
    $this->registerPolicies();

    Gate::define('user-permission', function (User $user) {
        $userPermissions = $user->load('roles.permissions')->roles->transform(function($role){
            return $role->permissions->transform(function($permission){
                return $permission->name;
            });
        });
        $userPermissions = $userPermissions->first();
        $permissions = isset($userPermissions) ? $userPermissions->toArray() : [];
        return in_array('add_product', $permissions);
    });
}
```

### ./routes/web.php

```php

use Illuminate\Support\Facades\Gate;

Route::get('/test-permission', function(){
    if (Gate::allows('user-permission')) {
        return "Possui permissão";
    } else {
        return "Não possui permissão";
    }
});
```
