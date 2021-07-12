<?php

use Illuminate\Routing\Controller;
use App\Models\User;


class AccessoController extends Controller {

    public function index() {
        if(session('id') != null) {
        return redirect("homepage");
        }
        else {
           $old_id = Request::old('id');
            return view('accesso')
            ->with('csrf_token', csrf_token())
            ->with('old_id',$old_id);
        }
     }

     public function controlloAccesso() {
         $utente = User::where('id', request('id'))->first();

         if($utente !== null && Hash::check(request('password'),$utente->password)) {
             Session::put('id', $utente->id);
             return redirect('homepage');
         }
         else {
             return redirect('accesso')->withInput();
         }
     }

     public function abbandona() {
         Session::flush();
         return redirect('accesso');

     }
}
?>