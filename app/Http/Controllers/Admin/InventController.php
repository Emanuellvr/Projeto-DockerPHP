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
        $this->middleware('auth');
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
        
        $item->add(Request()->name, Request()->amount, Request()->description, $type->id, auth()->user()->id);
                

        return redirect()
                ->route('adicionar')
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
        $item->amount = $request->get('amount');
        $item->description = $request->get('description');
        $item->type_id = $type->id;        
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

        // Se não especificar nada, $search recebe um astring aletoria para não retornar nada
        if($search == null)                   
            $search = "999#~;.";
        
        // Procura itens por seu nome
        $items = Item::where('name', 'LIKE', '%'.$search.'%')->get();
        
        // Procura TipoItem pelo nome
        $collection = TypeItem::where('name', 'LIKE', '%'.$search.'%')->get();  
                
        if($collection->get('0') != null) {
            
            $type = $collection->get('0');  // Pegar o objeto do tipo TypeItem da collection                

            // Pesquisa os itens que tem o id do objeto $type
            $itemByType = Item::where('type_id', $type->id)->get();
            
            // $collection é um auxiliar que recebe uma collection com os itens de $itemByType
            $collection->add($itemByType);
            
            // Quantidade de intens no array da collection
            $qtdDeItensPortipo = count($collection->get('1')); 

            // Adiciona cada item à collection $items criada no inicio do método
            for ($i=0; $i < $qtdDeItensPortipo; $i++) { 
                $items->add($collection->get('1')->get($i)); //
            }
        }                          

        $types = TypeItem::get();

        if(count($items)>0)
            return view('home', compact('items', 'types'))->withQuery($search);
        else
        {
            $items = auth()->user()->item;  
            $types = TypeItem::get(); 
            return redirect() 
                    ->route('home', compact('items', 'types'))
                    ->with('warning', 'Nada encontrado. Tente pesquisa novamente !');
        }            
    }

    public function addType(TypeItem $TypeItem){

        $TypeItem->addType(Request()->newType);

        return redirect()
            ->route('adicionar')
            ->with('success', 'Tipo adicionado com sucesso');
    }

}
