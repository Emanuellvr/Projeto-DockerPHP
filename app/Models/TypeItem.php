<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeItem extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function addType($name){                

        TypeItem::create([
            'name'          => $name,                       
        ]);
    }
}
