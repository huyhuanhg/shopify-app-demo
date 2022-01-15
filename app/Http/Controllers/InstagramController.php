<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstagramController extends Controller
{
    public function renderImages(Request $request)
    {
//        $request->type ==> query get images
        $images = [
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
            "https://video.visumo.jp/image/e3051808-1f0a-44ab-aeda-2be31536319a/e5080611-0104-4eb2-863c-34262979d602-large.jpg"
        ];
        return view('instagram_images_allu', ['images' => $images]);
    }
}
