<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 授業①で tinker から登録したのと同じカテゴリ10件
        $categoryNames = ['食費', '電気代', 'ガス代', '水道代', '日用品', '交通費', '通信費', '住居費', '娯楽費', 'その他'];

        foreach ($categoryNames as $categoryName) {
            Category::firstOrCreate(['name' => $categoryName]);
        }

        // 授業①で tinker から登録したのと同じ取引3件
        Transaction::create(['category_id' => 1, 'type' => 'expense', 'amount' => 1200, 'occurred_at' => '2026-08-01', 'note' => '昼食']);
        Transaction::create(['category_id' => 2, 'type' => 'expense', 'amount' => 4800, 'occurred_at' => '2026-08-01', 'note' => '8月分']);
        Transaction::create(['category_id' => 1, 'type' => 'expense', 'amount' => 3480, 'occurred_at' => '2026-08-02', 'note' => '夕食']);
    }
}
