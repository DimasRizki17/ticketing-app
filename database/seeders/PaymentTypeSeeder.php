<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentType;

class PaymentTypeSeeder extends Seeder
{
    public function run(): void
    {
        PaymentType::insert([
            ['name' => 'Transfer Bank'],
            ['name' => 'E-Wallet'],
            ['name' => 'Cash'],
        ]);
    }
}
