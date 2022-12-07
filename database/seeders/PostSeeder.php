<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 6; $i++) {
            Post::create([
                "user_id" => $i,
                "title" => "Bài Mất Đồ $i",
                "post_type" => 1,
                "item_type" => 1,
                "found_address" => "1$i Huỳnh Trân Công Chúa, TP.HCM",
                "content" => "Mới nhặt được Iphone 1$i",
                "image_1" => "image_$i.jpg",
                "image_2" => "image_$i.jpg",
                "image_3" => "image_$i.jpg",
                "image_4" => "image_$i.jpg",
                "image_5" => "image_$i.jpg"
            ]);
        }
    }
}
