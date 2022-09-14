# Queue Emails And Listeners

### Build Queue

.env
```php
QUEUE_CONNECTION=database
```

### Make Queue table

```

php artisan queue:table

php artisan migrate

```

The queue table will be created at the migration database/migrations/2022_09_14_130241_create_jobs_table.php

```php
Schema::create('jobs', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('queue')->index();
    $table->longText('payload');
    $table->unsignedTinyInteger('attempts');
    $table->unsignedInteger('reserved_at')->nullable();
    $table->unsignedInteger('available_at');
    $table->unsignedInteger('created_at');
});
```

#### app/Observers/ProductObserver.php
```php
public function updated(Product $product)
{
    $email = env('MAIL_FROM_ADDRESS');
    Mail::to($email)->queue(new ProductStock($product));
}
```

#### app/Listeners/OrderCreatedListener.php
Add the <strong>implements ShouldQueue</strong> to the Listener Class.

```php
namespace App\Listeners;

use App\Events\OrderCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Product;

class OrderCreatedListener implements ShouldQueue{}
```

### Run Queue Work
```
php artisan queue:work
```
![TDD](/imgs/queueWork.png)