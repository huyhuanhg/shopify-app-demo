<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Shopify\Clients\Rest;
use Symfony\Component\HttpFoundation\Response;

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

Route::namespace("App\Http\Controllers\Api")->group(function () {
    Route::resource('/test-method', 'TestMethodController')->except(['create', 'show', 'edit']);
    Route::get('/estimated-arrival-date/{product}', "EstimatedArrivalController@getEstimatedArrivalDate");
    Route::get('/globalnav-noti', "NotificationController@globalNavNoti");
    Route::get('/instagram/types', "InstagramController@getTypeList");
    Route::get('/top-banner-random', "TopBannerController@getRandom");
});

Route::namespace("App\Http\Controllers")->group(function () {
    Route::get("/instagram-images", "InstagramController@renderImages");
    Route::get("/user-review", "UserReviewController@renderReviews");
    Route::get('/review-filter', "UserReviewController@renderReviewFilter");
});

Route::get('/product/{product}', function (Product $product, Request $request) {
    try {
        return response()->json([
            'product' => $product,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'msg' => $e->getMessage()
        ]);
    }
});

Route::post('/product/{product}/request', function (Request $request, Product $product) {
    return response()->json([
        'icon_id' => $request->iconId,
        'product' => $product
    ]);
});

Route::get('/product/{product}/rate', function (Product $product) {
    $rate = rand(1, 3);
    $rate = $rate === 1 ? "A" : ($rate === 2 ? "B" : "C");
    return response()->json([
        "rate" => $rate
    ]);
});

Route::get('/product/{product}/visit', function (Product $product) {
    return response()->json([
        "visit_count" => rand(1, 100)
    ]);
});

Route::fallback(function () {
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'
    ], Response::HTTP_NOT_FOUND);
});
