<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'amount', 'user_id', 'price', 'type_id',
    ];

    public function add($name, $type, $price){                

        Item::create([
            'name'      => $name,                                                           
            'type_id'   => $type,
            'price'     => $price,
        ]);
    }

    public function typeItem(){
        return $this->hasMany(TypeItem::class);
    }

}
