<?php

namespace App\Http\Controllers\Api;

use App\Events\NewMessageCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessage;
use App\Http\Resources\MessageResource;
use Illuminate\Http\Request;
use App\Models\Message;

class ChatApiController extends Controller
{
    protected $message;

    public function __construct(Message $message)
    {
        $this->mesage = $message;
    }

    public function store(StoreMessage $request)
    {
        $reslutMessage = $request->user()->messages()->create($request->all());

        NewMessageCreated::dispatch($reslutMessage);

        return new MessageResource($reslutMessage);
    }
}
