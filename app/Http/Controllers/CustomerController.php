<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use Exception;

class CustomerController extends BaseController
{
    

    public function index()
    {
        $customers = Customer::all();

        return $this->sendResponse($customers, 'success');
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email'
            ]);

            $customer = Customer::create($request->all());

            return $this->sendResponse($customer, 'success');
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
