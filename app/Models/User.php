<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name','email','password','no_hp','alamat','role'
    ];

    protected $hidden = ['password'];

    // 1 user punya banyak transaksi
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
