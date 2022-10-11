<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $loggedUserId = auth()->user()->id;
        $users = $this->user->where('id', '<>', $loggedUserId)->get();

        return UserResource::collection($users);
    }
}
