<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeItem;
use Illuminate\Http\Request;
use Mockery\Matcher\Type;

class AdminController extends Controller
{
    public function index(){

        $items = auth()->user()->item;    
            
        $types = TypeItem::get();        

        return view('home', compact('items', 'types'));
    }
}
