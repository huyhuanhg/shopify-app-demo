<?php

use App\Models\Product;
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

use Session;

Route::get('/', function () {
    try {
        $client = new Rest("huyhuan.myshopify.com", "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");

        $arrBody = [];

        for ($i = 1; $i < 5; $i++) {
            $response = $client->post(
                "metafields",
                [
                    "metafield" => [
                        "namespace" => "global",
                        "key" => "product_request_icon-$i",
                        "value" => json_encode([
                            "request-id" => $i,
                            "request-title" => "状態について詳しく知りたい",
                            "src-on" => "https://allu-official.com/img/usr/common/ic_request_0${i}_on.png",
                            "src-off" => "https://allu-official.com/img/usr/common/ic_request_0${i}_off.png",
                            "request-finish-txt" => "送信されました。"
                        ]),
                        "type" => "json"
                    ]
                ]
            );
            array_push($arrBody, json_decode($response->getBody(), true));
        }

        return response()->json($arrBody);
    } catch (\Exception $exception) {
        return response()->json(['msg' => $exception->getMessage()]);
    }
});

Route::get('/get', function () {
    try {
        $client = new Rest("huyhuan.myshopify.com", "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");
        $response = $client->get(
            "metafields"
        );
        return response()->json(json_decode($response->getBody(), true));
    } catch (\Exception $exception) {
        return response()->json(['msg' => $exception->getMessage()]);
    }
});

Route::post('/product/{product}', function ($product, Request $request) {
    try {
        $p_static = Product::find($product);
        return response()->json([
            'product_id' => $product,
            'icon_id' => $request->icon_id,
            'product_static' => $p_static,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'msg' => $e->getMessage()
        ]);
    }
});

Route::resource('/test-method', 'App\Http\Controllers\TestController')->except(['create', 'show', 'edit']);

Route::resource('/product/{product_id}/request', 'App\Http\Controllers\ProductRequestController')
    ->except(['create', 'edit']);

//Notification global nav
Route::get('/globalnav-noti', function () {
    return response()->json([
        [
            "link" => "https://allu-official.com/shop/t/t1150/",
            "title" => "【ALLUオンラインストア】1月休業日のお知らせ"
        ],
        [
            "link" => "https://allu-official.com/shop/t/t1149/",
            "title" => "【ALLUオンラインストア】降雪や強風による荷物のお届け遅延について"
        ],
        [
            "link" => "https://allu-official.com/shop/t/t1143/",
            "title" => "ALLU表参道店オープン延期のお知らせ"
        ]
    ]);
});

//Estimated arrival date of backordered items
Route::get('/estimated-arrival-date/{product_id}', function (Request $request, $product_id) {
    return response()->json([
        [
            "store_name" => "ALLU銀座店",
            "arrival_date" => "2022/01/16"
        ],
        [
            "store_name" => "ALLU心斎橋店",
            "arrival_date" => "2022/01/16"
        ],
        [
            "store_name" => "なんぼや札幌大通店",
            "arrival_date" => "2022/01/18"
        ],
        [
            "store_name" => "なんぼや仙台クリスロード店",
            "arrival_date" => "2022/01/18"
        ],
        [
            "store_name" => "なんぼや自由が丘店",
            "arrival_date" => "2022/01/18"
        ],
        [
            "store_name" => "なんぼや名古屋サンロード店",
            "arrival_date" => "2022/01/18"
        ],
        [
            "store_name" => "なんぼや神戸三宮駅前店",
            "arrival_date" => "2022/01/19"
        ],
    ]);
});

//Product rate
Route::get('/product/{product_id}/rate', function ($product_id) {
    $rate = rand(1, 3);
    $rate = $rate === 1 ? "A" : ($rate === 2 ? "B" : "C");
    return response()->json([
        "rate" => $rate
    ]);
});

//Product customer visit
Route::get('/product/{product_id}/visit', function ($product_id) {
    return response()->json([
        "visit_count" => rand(1, 100)
    ]);
});

Route::fallback(function () {
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'
    ], 404);
});
