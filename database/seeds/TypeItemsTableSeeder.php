<?php

use App\Models\TypeItem;
use Illuminate\Database\Seeder;
use Mockery\Matcher\Type;

class TypeItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeItem::create([
            'name'          => 'Escritório',
        ]);
        TypeItem::create([
            'name'          => 'Ferramentas',
        ]);
        TypeItem::create([
            'name'          => 'Feira',
        ]);        
        TypeItem::create([
            'name'          => 'Material de limpeza',
        ]);
    }
}
