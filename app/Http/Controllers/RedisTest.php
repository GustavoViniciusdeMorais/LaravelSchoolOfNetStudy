<?php

namespace App\Http\Controllers;

use App\Http\Requests\RedisTestRequest;
use Illuminate\Support\Facades\Redis;

class RedisTest extends Controller
{
    
    public function index()
    {
        $result = Redis::get('msg');

        return response()->json([
            'data' => $result
        ]);
    }

    public function store(RedisTestRequest $request)
    {
        $msg = $request->msg;
        Redis::set('msg', $msg);
        return response()->json([
            'data' => $msg
        ]);
    }
}
