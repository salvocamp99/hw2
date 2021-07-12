<?php

use Illuminate\Routing\Controller;
use App\Models\Restaurant;
use App\Models\User;

class HomepageController extends Controller {

    public function index() {
      
        $utente = User::find(session('id'));
        
        if (!isset($utente))
            return redirect('accesso');
            else return view('homepage')
            ->with('csrf_token',csrf_token())
            ->with('id',$utente->id);

    }
    
    public function carica(){
       $restaurants=Restaurant::all();
       $post_array=array();
       foreach($restaurants as $restaurant){
       $isFollowed= $restaurant->users()->where('user_id',Session::get('id'))->first()?true:false;
        $post_array[]=array('id_r'=>$restaurant->id,'nome_ristorante'=>$restaurant->nome_ristorante,'immagine'=>$restaurant->immagine,'descrizione'=>$restaurant->descrizione,'dettagli'=>$restaurant->dettagli,'isFollowed'=>$isFollowed);
       } 
       return $post_array;
    
    }
    public function carica_seguiti($id){
    $ristorante=Restaurant::find($id);
    if(!$ristorante->users()->where('user_id',Session::get('id'))->exists()){
    $ristorante->users()->attach(Session::get('id'));
    return array('id_r'=>$id,'nome_ristorante'=>$ristorante->nome_ristorante,'immagine'=>$ristorante->immagine,'isFollowed'=>true);
    }
    else return ['isFollowed'=>false];
    }
     public function rimuovi_seguiti($id){
        $ristorante=Restaurant::find($id);
        if($ristorante->users()->where('user_id',Session::get('id'))->exists()){
        $ristorante->users()->detach(Session::get('id'));
        }


    }
    
}



?>  