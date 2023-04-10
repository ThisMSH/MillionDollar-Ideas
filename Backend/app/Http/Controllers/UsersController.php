<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    use HttpResponses;

    public function show(Request $request)
    {
        return $this->success($request->user());
        // return $this->success([
        //     'user' => $request->user(),
        //     'token' => $request->user()->createToken('auth-token')->plainTextToken // temp token for testing api (delete after finishing)
        //     // 'token' => $request->bearerToken()
        // ]);
    }
}
