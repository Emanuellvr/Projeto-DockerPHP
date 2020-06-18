<?php

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Item::create([
            'name'      => 'Caneta BIC',
            'user_id'     => 1,
            'amount'  => 5,
            'description' => 'Caneta bic azul 0.7'
        ]);
        
        Item::create([
            'name'      => 'lapiseira',
            'user_id'     => 1,
            'amount'  => 5,
            'description' => 'Lapiseira Tecno cis 0.5'
        ]);
        
    }
}