<?php

namespace Database\Seeders;

use App\Models\ItemType;
use Illuminate\Database\Seeder;

class ItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemType::create([
            "name" => "Ví / Bóp"
        ]);
        ItemType::create([
            "name" => "Điện thoại"
        ]);
        ItemType::create([
            "name" => "Trang sức"
        ]);
        ItemType::create([
            "name" => "Tiền"
        ]);
        ItemType::create([
            "name" => "Khác"
        ]);
    }
}
