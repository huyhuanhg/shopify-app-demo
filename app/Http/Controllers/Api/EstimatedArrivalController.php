<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class EstimatedArrivalController extends Controller
{
    public function getEstimatedArrivalDate(Request $request, Product $product): \Illuminate\Http\JsonResponse
    {
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
    }
}
