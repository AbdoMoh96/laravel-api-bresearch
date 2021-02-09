<?php

namespace Database\Seeders;

use App\Models\Types;
use Illuminate\Database\Seeder;

class ClientTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type1 = new Types();
        $type1->customer_type_en = 'Retail';
        $type1->customer_type_ar = 'باع بالتجزئة';
        $type1->save();

        $type2 = new Types();
        $type2->customer_type_en = 'Institution';
        $type2->customer_type_ar = 'مؤسسة';
        $type2->save();
    }
}
