<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Profile extends Model
{

    protected $table='profile';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gender', 'last_name','first_name','phone','email'
    ];


    public function User()
    {
      return $this->belongsTo('App\User','email', 'email');
    }
}
