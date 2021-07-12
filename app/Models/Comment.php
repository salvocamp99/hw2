<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
protected $table='comments';
protected $primaryKey='id';
protected $autoIncrement=true;
public $timestamps=true;

protected $fillable=[
'id','user_id','review_id','testo'
];
protected $hidden = [
    'user_id', 'review_id','created_at', 'updated_at'
];
public function users() {
    return $this->belongsTo("App\Models\User");
}
public function reviews() {
    return $this->belongsTo("App\Models\Review");
}
public function getTimeAttribute(){
    return $this->created_at->timezone('Europe/London')->diffForHumans(null, false, false);
}

}
