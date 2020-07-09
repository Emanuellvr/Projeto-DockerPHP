<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\TypeItem;
use Illuminate\Http\Request;
use Mockery\Matcher\Type;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    } 


    public function home(){

        $items = Item::get();   
            
        $types = TypeItem::get();        

        return view('admin.adminHome', compact('items', 'types'));
    }

    public function searchAdmin(Request $request){
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
            return view('admin.adminHome', compact('items', 'types'))->withQuery($search);
        else
        {
            $items = Item::get();
            $types = TypeItem::get(); 
            return redirect() 
                    ->route('admin.home', compact('items', 'types'))
                    ->with('warning', 'Nada encontrado. Tente pesquisa novamente !');
        }            
    }
}
