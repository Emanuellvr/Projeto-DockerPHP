<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\TypeItem;
use Illuminate\Http\Request;
use Mockery\Matcher\Type;

class UserController extends Controller
{      
    public function __construct()
    {
        $this->middleware('auth:web');
    }  
    
    public function addToCart($id){        
        $item = Item::find($id);        

        $item->user_id = auth()->user()->id;
        $item->save();

        return redirect()
                    ->route('home')
                    ->with('cart', 'Adicionado ao carrinho');
    }

    public function removeFromCart($id){
        $item = Item::find($id);        

        $item->user_id = null;
        $item->save();

        return redirect()
                    ->route('cart.show')
                    ->with('cart', 'Removido do carrinho');
    }

    public function showCart(){
        $items = auth()->user()->item; 
        $totalPrice = 0.0;
        foreach ($items as $item) {
            $totalPrice += $item->price;
        }                     
            
        $types = TypeItem::get();        

        return view('inventario.cart', compact('items', 'types', 'totalPrice'));
    }
    
}
