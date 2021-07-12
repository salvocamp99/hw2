<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Recipe;

class RecipeController extends Controller {
public function index(){
    $utente=User::find(Session::get('id'));
    
    if (!isset($utente)){
    return redirect('accesso');
    }
    else{
     return view('ricetta')
    ->with('csrf_token',csrf_token());
}
}
public function cerca($type,$query){
 switch($type){
case'Birre':return $this->cercaBirre($query);
case'Cibo':return $this->cercaCibi($query);
default:break;
 }   
}
function cercaBirre($query){
$json=Http::get('https://api.punkapi.com/v2/beers',[
'beer_name'=>$query,
'per_page'=>30,
]);
if($json->failed())abort(500);
return ($json);
}
public function cercaCibi($query){
$json=Http::get('https://api.edamam.com/search',[
'q'=>$query,
'app_id'=>env("CIBI_APPID"),
'app_key'=>env("CIBI_APPKEY"),
'limit'=>30
]);
if($json->failed())abort(500);
 return($json);
}
   }
   
?>
