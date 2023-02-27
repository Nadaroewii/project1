<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
    use HasFactory;
    use Sortable;

    protected $table = 'tb_user';
    protected $primaryKey = 'user_id';

    protected $fillable=['name', 'gender', 'hobby', 'email', 'telp', 'username', 'password'];

    // function setAttribute($values = null)
    // {
    //     if(null === $values) {
    //     $this->attributes['hobby'] = null;
    // }
    //     $this->attributes['hobby'] = json_encode($values);
    // }

    // function getAttribute($values)
    // {
    //     if(null === $values){
    //     return null;
    // }
    // return json_decode($values,true);
    // }
    public $sortable = [
        'name', 'gender', 'hobby', 'email', 'telp', 'username',
    ];
    // protected $casts = ['hobby'=>'array'];


}
