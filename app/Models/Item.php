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
        'name', 'amount', 'user_id', 'description',
    ];

    public function add($name, $amount, $description, $idUser){                

        Item::create([
            'name'          => $name,
            'user_id'       => $idUser,
            'amount'        => $amount,
            'description'   => $description,             
        ]);
    }

    public function typeItem(){
        return $this->hasMany(TypeItem::class);
    }

}
