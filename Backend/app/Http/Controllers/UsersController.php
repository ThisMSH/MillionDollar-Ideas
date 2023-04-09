<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    use HttpResponses;

    public function show(Request $request)
    {
        return $this->success([
            'user' => $request->user(),
            'token' => $request->user()->createToken('auth-token')->plainTextToken // temp token for testing api
            // 'token' => $request->bearerToken()
        ]);
    }
}
