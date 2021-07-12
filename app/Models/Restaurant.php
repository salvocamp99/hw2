<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model {
protected $table='restaurants';
protected $primaryKey='id';
protected $autoIncrement=true;
public $timestamps=false;

protected $fillable=[
'id',
'nome_ristorante',
'immagine',
'descrizione',
'dettagli'
];

public function users(){
return $this->belongsToMany("App\Models\User");
}
public function reviews(){
return $this->hasMany("App\Models\Review");
}
}






?>