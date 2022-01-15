<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopBannerController extends Controller
{
    public function getRandom(): \Illuminate\Http\JsonResponse
    {
        $banner = [
            [
                "background_image" => "https://allu-official.com/img/usr/freepage/202010_goto/header_pc.jpg",
                "img_src" => "https://allu-official.com/img/usr/freepage/202010_goto/header_pc.jpg",
                "img_alt" => "店舗取り寄せ",
                "link_to" => "#"
            ],
            [
                "background_image" => "https://allu-official.com/img/usr/eventpage/202108_paypay/header_pc.jpg",
                "img_src" => "https://allu-official.com/img/usr/eventpage/202108_paypay/header_pc.jpg",
                "img_alt" => "ペイペイ",
                "link_to" => "#"
            ],
            [
                "background_image" => "https://allu-official.com/img/usr/freepage/202006_shoppingloan/header_pc.jpg",
                "img_src" => "https://allu-official.com/img/usr/freepage/202006_shoppingloan/header_pc.jpg",
                "img_alt" => "無金利ショッピングローン",
                "link_to" => "#"
            ],
            [
                "background_image" => "https://allu-official.com/img/usr/eventpage/202104_nanboya/header_pc.jpg",
                "img_src" => "https://allu-official.com/img/usr/eventpage/202104_nanboya/06/header_pc.png",
                "img_alt" => "なんぼや時計修理",
                "link_to" => "#"
            ]
        ];

        return response()->json($banner[rand(0, count($banner) - 1)]);
    }
}
