<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Requests\ItemValidationFormRequest;
use App\Models\TypeItem;
use Symfony\Component\Console\Input\Input;

/*
 * _Contruct para que as funções só sejam acessadas pelo usuário logado
 * Funções index e add para adicionar item
 * Funções edit e apdate para editar item
 * Função delete para deletar item
 * Função search para fazer uma pesquisa detalhada na lista de itens
 * Função addType para adicionar tipo
 */

class InventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }    

    public function index(){
        $types = TypeItem::get();
        return view('inventario.add', compact('types'));
    }

    public function add(ItemValidationFormRequest $request, Item $item){
        
        /*
         * Catch name, amount, description from request
         * $CollectionType is a collection with a TypeItem
         * $type is the object typeItem
         */
        
        $Collectiontype = TypeItem::where('name', 'LIKE', '%'.Request()->Type.'%')->get();
        $type = $Collectiontype->get('0');
        
        $item->add($request->name, $type->id, $request->price);
                

        return redirect()
                ->route('admin.home')
                ->with('success', 'Adicionado com sucesso');
    }

    public function edit($id){
        
        $item = Item::find($id); 
        $types = TypeItem::get();            

        return view('inventario.edit', compact('item', 'id', 'types'));
    }

    public function updateItem(ItemValidationFormRequest $request, $id){
        
        $item = Item::find($id); 
        $Collectiontype = TypeItem::where('name', 'LIKE', '%'.$request->Type.'%')->get();        
        $type = $Collectiontype->get('0');            
        
        $item->name = $request->get('name');                
        $item->type_id = $type->id;        
        $item->price = $request->get('price');  
        $item->save();

        return redirect()
                    ->route('admin.home')
                    ->with('success', 'Alterado com Sucesso');
    }

    public function delete($id){
        $item = Item::find($id);
        $item->delete();

        return redirect()
                    ->route('admin.home')
                    ->with('success', 'Deletado com sucesso');
    }
    

    public function addType(TypeItem $TypeItem){

        $TypeItem->addType(Request()->newType);

        return redirect()
            ->route('adicionar')
            ->with('success', 'Tipo adicionado com sucesso');
    }

}
