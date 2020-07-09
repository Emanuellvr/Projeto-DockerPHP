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
            'name'       => 'Caneta BIC',            
            'price'      => 1.5,            
            'type_id'    => 1
        ]);
        Item::create([
            'name'       => 'lapiseira',            
            'price'      => 3.2,            
            'type_id'    => 1
        ]);
        Item::create([
            'name'       => 'Grampeador',            
            'price'      => 5.0,            
            'type_id'    => 1
        ]);
        Item::create([
            'name'       => 'Pasta de arquivos',            
            'price'      => 8.0,            
            'type_id'    => 1
        ]);

        Item::create([
            'name'       => 'Furadeira',            
            'price'      => 154.99,            
            'type_id'    => 2
        ]);
        Item::create([
            'name'       => 'Chave de fenda',            
            'price'      => 6.30,            
            'type_id'    => 2
        ]);
        Item::create([
            'name'       => 'Alicate',            
            'price'      => 12.0,            
            'type_id'    => 2
        ]);
        Item::create([
            'name'       => 'Fita Isolante',            
            'price'      => 4.5,            
            'type_id'    => 2
        ]);

        Item::create([
            'name'       => 'Melancia',            
            'price'      => 9.0,            
            'type_id'    => 3
        ]);
        Item::create([
            'name'       => 'Maçãs',            
            'price'      => 4.5,            
            'type_id'    => 3
        ]);
        Item::create([
            'name'       => 'Couve Flor',            
            'price'      => 6.5,            
            'type_id'    => 3
        ]);
        Item::create([
            'name'       => 'Poupa de Fruta',            
            'price'      => 11.40,            
            'type_id'    => 3
        ]);

        Item::create([
            'name'       => 'Pedrex',            
            'price'      => 9.50,            
            'type_id'    => 4
        ]);
        Item::create([
            'name'       => 'Sabonete Líquido',            
            'price'      => 4.0,            
            'type_id'    => 4
        ]);
        Item::create([
            'name'       => 'Vassoura',            
            'price'      => 5.0,            
            'type_id'    => 4
        ]);
        Item::create([
            'name'       => 'Desinfetante',            
            'price'      => 7.0,            
            'type_id'    => 4
        ]);
    }
}