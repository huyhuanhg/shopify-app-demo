<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestMethodController extends Controller
{
    protected $method;
    public function __construct(Request $request)
    {
        $this->method = $request->method();
    }

    public function __call($method, $parameters)
    {
        return response()->json([
            'method' => $this->method
        ]);
    }
}
