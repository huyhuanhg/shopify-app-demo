<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Shopify\Clients\Rest;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    try {
        $client = new Rest("your-development-store.myshopify.com", "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");
        $response = $client->post(
            "metafields",
            [
                "metafield" => [
                    "namespace" => "global",
                    "key" => "product_request_icons",
                    "value" => json_encode(['name' => "test"]),
                    "type" => "json"
                ]
            ]
        );
        echo "<pre>";
        print_r($response);
        echo "</pre>";
        return response()->json($response);
    } catch (\Exception $exception) {
        return response()->json(['msg' => $exception->getMessage()]);
    }
});

Route::get('/get', function () {
    try {
        $client = new Rest("your-development-store.myshopify.com", "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");
        $response = $client->get(
            "metafields"
        );
        return response()->json($response);
    } catch (\Exception $exception) {
        return response()->json(['msg' => $exception->getMessage()]);
    }
});

Route::post('/product/{id}/request', function (Request $request, $id) {
    return response()->json([
        'product_id' => $id,
        'icon_id' => $request->iconId
    ]);
});

Route::resource('/test-method', 'App\Http\Controllers\TestController')->except(['create', 'show', 'edit']);


Route::fallback(function () {
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
});
