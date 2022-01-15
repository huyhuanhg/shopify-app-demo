<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function globalNavNoti(): \Illuminate\Http\JsonResponse
    {
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
    }
}
