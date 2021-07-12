<?php

use Illuminate\Routing\Controller;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Review;
use App\Models\Comment;

class ReviewController extends Controller {
public function index(){
if(Session::get("id_r")!==null){
$utente=User::find(Session::get('id'));
$ristorante=Restaurant::find(Session::get('id_r'));
return view('recensione')
->with('csrf_token',csrf_token())
->with('utente',$utente)
->with('ristorante',$ristorante);

}else{
return redirect('ristoranti');
}
if (!isset($utente)){
    return redirect('accesso');
}
    else return view('ristorante')
    ->with('csrf_token',csrf_token());
}
public function esci(){
Session::forget('id_r');
return redirect('ristoranti');
}
//creo recensione
public function caricaRecensioni(){
$utente=User::find(Session::get('id'));
$request=request();
$intestazione=$request['intestazione'];
$testo=$request['testo'];

if(!empty($intestazione)&&!empty($testo)){

if($request->file('file')!==null){
$file=$request->file('file');
if($file->getError()===0){
$name=$file->getClientOriginalName();
$tmp=explode(".",$name);
$ext=end($tmp);
if($ext==='jpg'||$ext==='png'){
$fileNameNew=uniqid('',true).".".$ext;
$fileDestination='../public/immagini'.$fileNameNew;
}
$res=move_uploaded_file($file->getPathname(),$fileDestination);
$postArray = array("nome" => $utente->nome, "cognome" => $utente->cognome,"id"=>$utente->id,"intestazione"=>$intestazione ,"testo" => $testo, "file" => $fileDestination, "type" => $ext);
$content=array("intestazione"=>$intestazione,"testo"=>$testo,"file"=>$fileDestination,"type"=>$ext);
$nuovaRecensione=Review::create([
'restaurant_id'=>Session::get('id_r'),
'user_id'=>Session::get('id'),
'content'=>$content
]);
if($nuovaRecensione){
return['review'=>$postArray,'id_rec'=>$nuovaRecensione->id,'num_likes'=>0,'num_commenti'=>0,'created_at'=>$nuovaRecensione->getTimeAttribute()];
}
}
else return["errore"=>"Errore caricamento file"];
}
}
else return["errore"=>"mancano intestazione e testo"];
}
//Al ricaricamento della pagina visualizzo le recensioni
public function ricarica(){
$utente=User::find(Session::get('id'));
$ristorante=Restaurant::find(Session::get('id_r'));
$recensioni_ristorante=$ristorante->reviews()->orderBy('id','desc')->get();

$array=array();
foreach($recensioni_ristorante as $recensione){
$commenti=array();
$utenteRecensione=User::find($recensione->user_id);
$mi_piace=$utente->likes()->where('review_id',$recensione->id)->exists();
$Commenti=Comment::where('review_id',$recensione->id)->get();
foreach($Commenti as $Commento){
$utenteCommento=User::find($Commento->user_id);
$commenti[]=['nome'=>$utenteCommento->nome,'cognome'=>$utenteCommento->cognome,'testo'=>$Commento->testo,'created_at'=>$Commento->getTimeAttribute()];
}

$array[]=['nome'=>$utenteRecensione->nome,'cognome'=>$utenteRecensione->cognome,'id'=>$utenteRecensione->id,'review'=>$recensione->content,'num_likes'=>$recensione->num_likes,'id_rec'=>$recensione->id,'mi_piace'=>$mi_piace,'created_at'=>$recensione->getTimeAttribute(),'commenti'=>$commenti];
}
return $array;
}
public function aggiungi($id){
$recensione=Review::find($id);

if($recensione==null){
return 'errore1';
}


if(!$recensione->likes()->where('user_id',Session::get('id'))->exists()){
$recensione->likes()->attach(Session::get('id'));
}
$recensioneAgg=Review::find($id);

return['num_likes'=>$recensioneAgg->num_likes];
}
public function rimuovi($id){
    $recensione=Review::find($id);
   
    if($recensione->likes()->where('user_id',Session::get('id'))->exists()){
    $recensione->likes()->detach(Session::get('id'));
    }
$recensioneAgg=Review::find($id);

    return['num_likes'=>$recensioneAgg->num_likes];
    }
//creo commento
public function aggiungi_commento($id,$commento){
$utente=User::find(Session::get('id'));
$comment=Comment::create([
'user_id'=>$utente->id,
'testo'=>$commento,
'review_id'=>$id
]);
if($comment){
return['nome'=>$utente->nome,'cognome'=>$utente->cognome,'testo'=>$commento,'created_at'=>$comment->getTimeAttribute()];
}else return["errore:"=>"Scrivi un commento"];

}

}
?>