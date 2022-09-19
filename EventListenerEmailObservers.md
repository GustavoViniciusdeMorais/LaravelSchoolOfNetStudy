# Event Listener Example

### Email

```

php artisan make:mail ProductStock --markdown=emails.products.stock

```

### Event Listener

```

php artisan make:event OrderCreated

php artisan make:listener OrderCreatedListener --event=OrderCreated

```

### Config MailTrap at .env file

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=b551a1ec05a444
MAIL_PASSWORD=d4dec829f5966a
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=gustavosystems@email.com
MAIL_FROM_NAME="${APP_NAME}"
```

#### app/Http/Controllers/OrderController.php
```php
public function store(Request $request)
{
    try{
        $request->validate([
            'customer_id' => 'required',
            'product_id' => 'required',
            'product_amount' => 'required'
        ]);

        $product = Product::where('id', $request->product_id)->first();

        $price = $product->price * $request->product_amount;

        $orderData = [
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'product_amount' => $request->product_amount,
            'price' => $price,
        ];

        $order = Order::create($orderData);

        OrderCreated::dispatch($order);

        return $this->sendResponse($order, 'success');
    }catch(Exception $e){
        return [
                'msg' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTrace()
        ];
    }
}
```

#### app/Events/OrderCreated.php
```php
public function __construct(Order $order)
{
    $this->order = $order;
}
```

#### app/Listeners/OrderCreatedListener.php
```php
public function handle(OrderCreated $event)
{
    $order = isset($event->order) ? $event->order : false;

    if ($order) {
        $product_id = $order->product_id;
        $product_amount = $order->product_amount;
        $product = Product::where('id', $product_id)->first();
        $product->stock -= $product_amount;
        $product->save();
    }
}
```

#### app/Observers/ProductObserver.php
```php
public function updated(Product $product)
{
    $email = env('MAIL_FROM_ADDRESS');
    Mail::to($email)->send(new ProductStock($product));
}
```

#### app/Mail/ProductStock.php
```php
public function build()
{
    return $this
            ->subject('Atualização de stock de produto')
            ->from(env('MAIL_FROM_ADDRESS'))
            ->markdown('emails.products.stock');
}
```
