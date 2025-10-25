<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = range(1,5);
        foreach ($arr as $a) {
            DB::table('tables')->insert([
                ['number' => $a ],
            ]);
        }
    }
}
