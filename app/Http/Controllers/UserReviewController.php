<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserReviewController extends Controller
{
    public function renderReviewFilter()
    {
        $filterList = [
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
        ];
        return view('review_filter_allu', ['f_list' => $filterList]);
    }

    public function renderReviews()
    {
        return view('review_content_allu');
    }
}
