<?php

use Illuminate\Routing\Controller;
use App\Models\Restaurant;
use App\Models\User;

class RestaurantController extends Controller {
  public function submit(){
    if(request('ristorante')!=null){
        Session::put('id_r',request('ristorante'));
        return redirect('recensioni');
 }
}

    public function index(){
        $utente = User::find(session('id'));
 
        if (!isset($utente)){
            return redirect('accesso');
        }
            else return view('ristorante')
        ->with('csrf_token',csrf_token());
    
    

            
    }

public function carica(){
   $restaurants=Restaurant::all();
   $post_array=array();
   foreach($restaurants as $restaurant){
    $restaurant->users()->where('user_id',Session::get('id'))->first()?true:false;
    $post_array[]=array('id_r'=>$restaurant->id,'nome_ristorante'=>$restaurant->nome_ristorante,'immagine'=>$restaurant->immagine,'descrizione'=>$restaurant->descrizione);
   } 
   return $post_array;

}

    
    }


?>  