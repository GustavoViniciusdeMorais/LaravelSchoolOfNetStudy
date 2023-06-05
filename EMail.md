# Email Config

```
php artisan make:mail OrderShipped
```

### Docker Compose
```yaml
mailhog_yii:
    image: mailhog/mailhog
    container_name: mailhog_yii
    ports:
        - 1025:1025
        - 8025:8025
    networks:
        rest-api-app-network:
            ipv4_address: 10.0.0.10
```

### /home/gustavopereira/Studies/LaravelSchoolOfNetStudy/routes/api.php
```php
Route::get('/email', [EmailController::class, 'test']);
```

### /home/gustavopereira/Studies/LaravelSchoolOfNetStudy/app/Http/Controllers/EmailController.php
```php
class EmailController extends Controller
{
    public function test()
    {
        // print_r(json_encode(['test']));echo "\n\n";exit;
        try {          
            Mail::to('admin@email.com')->send(new OrderShipped());
            print_r(json_encode(['after send']));echo "\n\n";exit;
        } catch (\Exception $e) {
            print_r(json_encode([$e->getMessage()]));echo "\n\n";exit;
        }
    }
}
```

### /home/gustavopereira/Studies/LaravelSchoolOfNetStudy/app/Mail/OrderShipped.php
```php
class OrderShipped extends Mailable
{
    public function build()
    {
        $product = new \StdClass();
        $product->title = 'asdfasdf';
        $product->stock = 'asdfasdf';
        return $this->markdown('emails.products.stock', ['product' => $product]);
    }
}
```

### /home/gustavopereira/Studies/LaravelSchoolOfNetStudy/resources/views/emails/products/stock.blade.php
```
@component('mail::message')
# Introduction

The stock of the product <strong>{{$product->title}}</strong> is now <strong>{{$product->stock}}</strong>.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
```

```
GET http://localhost/api/email
```



```
```

```
```
