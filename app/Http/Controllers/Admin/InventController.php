<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Requests\ItemValidationFormRequest;
use Symfony\Component\Console\Input\Input;

class InventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('inventario.add');
    }

    public function add(ItemValidationFormRequest $request, Item $item){
        $item->add(Request()->name, Request()->amount, Request()->description, auth()->user()->id);                
 
        return redirect()
                ->route('adicionar')
                ->with('success', 'Adicionado com sucesso');
    }

    public function edit($id){
        
        $item = Item::find($id);             

        return view('inventario.edit', compact('item', 'id'));
    }

    public function updateItem(ItemValidationFormRequest $request, $id){
        
        $item = Item::find($id);        
        
        $item->name = $request->get('name');
        $item->amount = $request->get('amount');
        $item->description = $request->get('description');
        $item->save();

        return redirect()
                    ->route('home')
                    ->with('success', 'Alterado com Sucesso');
    }

    public function delete($id){
        $item = Item::find($id);
        $item->delete();

        return redirect()
                    ->route('home')
                    ->with('success', 'Deletado com sucesso');
    }

    public function search(Request $request){
        $search = $request->get('table_search');        
        $items = Item::where('name', 'LIKE', '%'.$search.'%')->get();              

        if(count($items)>0)
            return view('home', compact('items'))->withQuery($search);
        else
        {
            $items = auth()->user()->item;  
            return redirect() 
                    ->route('home', compact('items'))
                    ->with('warning', 'Nada encontrado. Tente pesquisa novamente !');
        }            
    }

}
