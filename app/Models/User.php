<?php

namespace App\Models;

use App\Models\Order;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;
use Backpack\CRUD\CrudTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use CrudTrait;
   

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $primaryKey = 'id';
    protected $guarded = ['id' , 'role'];
    //protected $fillable = ['name', 'email', 'password', 'first_surname', 'second_surname'];
    protected $hidden = ['password', 'remember_token'];
    // protected $dates = [];


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function orders() {
        return $this-> hasMany(Order::class);
    }
    public function cart () {
        return $this-> orders() -> where('completed', false) -> first() -> books(); 
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    
    public function isAdmin() {
        return $this->role=='Admin';
    }
    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    /*
    |--------------------------------------------------------------------------
    | NOTIFIERS
    |--------------------------------------------------------------------------
    */
public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
