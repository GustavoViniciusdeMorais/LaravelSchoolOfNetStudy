<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Models\Product;
use App\Models\Order;
use Exception;

class OrderController extends BaseController
{
    

    public function index()
    {
        try{
            $orders = Order::all();

            return $this->sendResponse($orders, 'success');
        }catch(Exception $e){
            return [
                    'msg' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile(),
                    'trace' => $e->getTrace()
            ];
        }
    }

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

}
