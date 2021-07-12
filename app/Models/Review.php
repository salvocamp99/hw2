<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {
protected $table='reviews';
protected $primaryKey='id';
protected $autoIncrement=true;
public $timestamps=true;

protected $fillable=[
'id','user_id','restaurant_id','content','num_likes','num_commenti'
];
protected $casts= [
'content' => 'array'
];
protected $hidden = [
    'user_id','created_at', 'updated_at'
];
public function users() {
    return $this->belongsTo("App\Models\User");
}
public function likes() {
    return $this->belongsToMany('App\Models\User');
}
public function comments() {
    return $this->hasMany('App\Models\Comment');
}
public function restaurants() {
    return $this->belongsTo("App\Models\Restaurant");
}
public function getTimeAttribute(){
    return $this->created_at->timezone('Europe/London')->diffForHumans(null, false, false);
}
}






?>