<?php

namespace App\Models\loginUsers;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Costumer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'costumer';

    protected $fillable = [
        'FullName',
        'email',
        'password',
        'IpAddress',
        'Country'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
