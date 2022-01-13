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

//instagram carousel
Route::get('/instagram', function () {
    return response()->json([
        'type' => 'all',
        'images' => [
            "https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/carousel/e50b1b0e-0735-4b93-a1ce-b9e797911915-large.jpg",
            "https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50c030d-0f15-4918-a175-e5c73ecdb2b2-large.jpg",
            "https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/carousel/e40b0509-1006-4e0d-9a81-4fedbac8fdfa-large.jpg",
            "https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/carousel/e50c0b0e-1109-4189-8ae3-843e68a6532d-large.jpg",
            "https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50c0e10-0e02-44cd-99ba-28c5ed7f747a-large.jpg",
            'https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/carousel/e50c0b0e-1109-4477-b766-e3f1dd8963f1-large.jpg',
            'https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50c1f10-382d-47e5-b895-fafab7445383-large.jpg',
            'https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50c1c10-3910-4302-9925-b4f78873856b-large.jpg',
            'https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50c1b10-3a0c-4a02-add5-94bcd15d106b-large.jpg',
            'https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50c1910-3a21-4da2-8c0c-0ca1f6233a61-large.jpg',
            'https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50c1910-3a20-4fa5-8e16-3b749144cc9d-large.jpg',
            'https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50c1905-022a-4890-92d1-1e12cc8452a0-large.jpg',
            'https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/carousel/e5090a0b-1f04-4313-89c2-9a544808ba6e-large.jpg',
            'https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50c0109-0222-4b9a-a29b-0fff7f78f762-large.jpg',
            'https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/carousel/e5010e14-2f28-44fa-b773-ef82d1137d06-large.jpg',
            'https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50a1910-340c-4753-892e-ccbd1c4bb643-large.jpg',
            'https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50b0505-022b-4cd8-81ec-c07d8bdcc04d-large.jpg',
            'https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50a1610-3421-4de9-9878-b7276d154538-large.jpg',
            'https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50a1610-3421-4f2d-8b62-85bf92c2c924-large.jpg',
            'https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50a1604-3303-4ca8-b265-b9234aa44823-large.jpg',
            'https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50a1310-3516-43a7-9095-319c6f1854f0-large.jpg',
            'https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50a0f10-382b-4430-bb8b-016b2894e9d7-large.jpg',
            "https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50a0c10-3407-4f92-8352-c9937fd267ff-large.jpg",
            "https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e50a0b10-3433-4173-8af9-a2fea474aaeb-large.jpg",
            "https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e5081210-3b15-4f74-8ecf-4a3ac3c68510-large.jpg",
            "https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e5081010-3a17-4b7a-a2dd-7103f0a5d6a9-large.jpg",
            "https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e5080d11-0b33-409d-b5af-cc1c89e732c4-large.jpg",
            "https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e5080910-3a38-4c63-a993-e28c5c8bb730-large.jpg",
            "https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e5080611-0104-4eb2-863c-34262979d602-large.jpg",
        ]
    ]);
});

//get instagram type

Route::get('/instagram/type', function () {
    return response()->json([
        [
            'type' => 'バッグ',
            'type_id' => 1
        ],
        [
            'type' => '財布/小物',
            'type_id' => 2
        ],
        [
            'type' => 'アパレル',
            'type_id' => 3
        ],
        [
            'type' => 'アクセサリー',
            'type_id' => 4
        ],
        [
            'type' => 'ファッション雑貨',
            'type_id' => 5
        ],
        [
            'type' => '時計',
            'type_id' => 6
        ],
        [
            'type' => 'ネクタイ',
            'type_id' => 7
        ],
        [
            'type' => 'その他',
            'type_id' => 8
        ],
        [
            'type' => 'エルメス',
            'type_id' => 9
        ]
    ]);
});


//user Review store
Route::get('/user-review', function () {
    return view('review_content_allu');
//    return response()->json([
//        [
//            'id' => 1,
//            'user_name' => "ヨッシー",
//            "user_avatar" => "https://show.revico.jp/img/anonymous_icon.gif",
//            "review_title" => "シューズ",
//            "review_rate" => 5,
//            "review_content" => "",
//            "transaction_status" => "購入確認済み",
//            "created_at" => "2022.1.13",
//            "product" => [
//                "title" => "ヴィトン ファストレーンライン デニム スニーカー 7 メンズ ブルー モノグラム",
//                "image" => "https://allu-official.com/img/goods/L/A0891294.JPG"
//            ],
//            "store_answer" => [
//                "content" => 'この度は、弊社商品をご注文いただき誠にありがとうございます。<br><br>状態の良い商品をお客様にお届けすることができ、私も大変嬉しく思います。今後も安心してご利用いただけるよう努めて参りますので、またのご利用を楽しみにお待ちしております♪',
//                "created_at" => "2022.1.13"
//            ]
//        ],
//        [
//            'id' => 2,
//            'user_name' => "ちょーみ",
//            "user_avatar" => "https://show.revico.jp/img/anonymous_icon.gif",
//            "review_title" => "アルマbb",
//            "review_rate" => 5,
//            "review_content" => "Aランクで購入。<br>新品同様に綺麗なお品で、大満足でした。<br>",
//            "transaction_status" => "購入確認済み",
//            "created_at" => "2022.1.12",
//            "product" => [
//                "title" => "ヴィトン エピ アルマBB M58706",
//                "image" => "https://allu-official.com/img/goods/L/XO015847.JPG"
//            ],
//            "store_answer" => [
//                "content" => "この度は、ALLUをご利用いただき誠にありがとうございます。<br><br>大満足とのお言葉を聞くことができ、スタッフ一同大変嬉しく思います♪お色味も可愛らしい素敵な商品ですので、ぜひご愛用頂ければ幸いです。<br><br>またのご利用を楽しみにお待ちしております。",
//                "created_at" => "2022.1.12"
//            ]
//        ],
//    ]);
});

//user review filter list
Route::get('/review-filter', function () {
    return response()->json([
        [
            'id' => 1,
            'title' => '商品'
        ],
        [
            'id' => 2,
            'title' => '状態'
        ],
        [
            'id' => 3,
            'title' => '大満足'
        ],
        [
            'id' => 4,
            'title' => '梱包'
        ],
        [
            'id' => 5,
            'title' => '対応'
        ],
        [
            'id' => 6,
            'title' => '満足'
        ],
        [
            'id' => 7,
            'title' => '買い物'
        ],
        [
            'id' => 8,
            'title' => '新品'
        ],
        [
            'id' => 9,
            'title' => 'もの'
        ],
        [
            'id' => 10,
            'title' => '機会'
        ],
        [
            'id' => 11,
            'title' => '発送'
        ],
        [
            'id' => 12,
            'title' => 'こちら'
        ],
        [
            'id' => 13,
            'title' => '美品'
        ],
        [
            'id' => 14,
            'title' => '商品の状態'
        ],
        [
            'id' => 15,
            'title' => '品物'
        ],
        [
            'id' => 16,
            'title' => 'サイズ'
        ],
        [
            'id' => 17,
            'title' => '購入'
        ],
        [
            'id' => 18,
            'title' => '使用感'
        ],
        [
            'id' => 19,
            'title' => 'お品'
        ],
        [
            'id' => 20,
            'title' => '今回'
        ]
    ]);
});

//user review filter list
Route::get('/top-banner', function () {
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
});

Route::fallback(function () {
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'
    ], 404);
});
