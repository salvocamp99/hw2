<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistratiController extends Controller {


    protected function create()
    {
        $request = request();
        if($this->count($request) == 0) {
            $newUser = User::create([
            'id' => $request['id'],
            'nome' => $request['nome'],
            'cognome' => $request['cognome'],
            'email' => $request['email'],  
            'password' => Hash::make($request['password'])
           
            ]);
            if ($newUser) {
                Session::put('id', $newUser->id);
                return redirect('homepage');
            } 
            else {
                return redirect('registrati')->withInput();
            }
        }
        else 
            return redirect('registrati')->withInput(); 

         
        
    }
    
 
//controllo eventuali errori 
    private function count($data) {
        $errore = array();
        
        // Controllo che l'username rispetti le richieste 
        if(!preg_match('/^[a-zA-Z0-9_]{1,20}$/', $data['id'])) {
            $errore[] = "Nome utente non valido";
        } else {
            $id = User::where('id', $data['id'])->first();
            if ($id !== null) {
                $errore[] = "Nome utente non disponibile";
            }
        }
        //verifico la lunghezza della password
        if (strlen($data["password"]) < 8) {
            $errore[] = "Password troppo corta";
        } 
        //controllo anche il conferma password
        if (strcmp($data["password"], $data["conferma_password"]) != 0) {
            $errore[] = "Password non uguali";
        }
        //verifico la mail
        if(!preg_match('/^[a-z0-9._%-]+@[a-z0-9.-]+\.[a-z]{2,4}$/',$data['email'])){
            $errore[] = "Email non valida";
        } else {
            $email = User::where('email', $data['email'])->first();
            if ($email !== null) {
                $errore[] = "Email già utilizzata";
            }
        }

        return count($errore);
    }

    public function verificaUtente($query) {
    $exist = User::where('id', $query)->exists();
        return ['exists' => $exist];
    }

    public function controlloEmail($query) {
        $exist = User::where('email', $query)->exists();
        return ['exists' => $exist];
    }

    public function index() {
        return view('registrati')
        ->with('csrf_token', csrf_token());
    } 

}
?>