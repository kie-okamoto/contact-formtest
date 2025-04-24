<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
    /**
     * データベースのシーディングを実行
     *
     * @return void
     */
    public function run()
    {
        // まずカテゴリを登録してから Contact を生成
        $this->call(CategorySeeder::class);

        // Contact を 35 件生成（カテゴリの存在が前提）
        Contact::factory(35)->create();
    }
}
