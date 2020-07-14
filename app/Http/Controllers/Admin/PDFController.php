<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use App\Models\Item;
use App\Models\User;

require '../vendor/autoload.php';

class PDFController extends Controller
{
    public function relatorio(){
        $users = User::get();
        
        return view('admin.relatorio', compact('users'));
    }
    
    public function generatePDF(){

        $users = User::get();        
        $lucroTotal = 0;

        $html = '<h3> Usuários Cadastrados: </h3> <br>';

        foreach ($users as $user) {
            
            $items = $user->item;
            $gastoUsuario = 0;

            foreach ($items as $item) {                
                $lucroTotal += $item->price;
                $gastoUsuario += $item->price;
            }            

            $html .= $user->id . ' - ' . $user->name . '<br>';            
            $html .= $user->email . '<br>';
            $html .= 'Registrado em: ' . $user->created_at . '<br>';
            $html .= '<strong>Total gasto:</strong> ' . $gastoUsuario . '<hr>';
        }        
        $html .= '<br> <strong> Lucros total das vendas: </strong> R$ ' . $lucroTotal . '<br>';        
        
        $dompdf = new Dompdf();        

        $dompdf->loadHtml(' 
                <h1 style="text-align: center;"> Relatório </h1> 
                '. $html .'
            ');                               

        $dompdf->setPaper('A4');

        $dompdf->render();

        $dompdf->stream('Relatório.pdf', ['Attachment' => false]);

        exit(0);
        
    }        
    
}

