<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestMethodController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'method' => $request->method()
        ]);
    }
    public function store(Request $request)
    {
        return response()->json([
            'method' => $request->method()
        ]);
    }
    public function update(Request $request, $id)
    {
        return response()->json([
            'method' => $request->method(),
            'product_id' => $id
        ]);
    }
    public function destroy(Request $request, $id)
    {
        return response()->json([
            'method' => $request->method(),
            'product_id' => $id
        ]);
    }
}
