<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstagramController extends Controller
{
    public function getTypeList(Request $request): \Illuminate\Http\JsonResponse
    {
        $types = [
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
        ];
        return response()->json($types);
    }
}
