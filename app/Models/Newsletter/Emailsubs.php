<?php

namespace App\Models\Newsletter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emailsubs extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'email',
    ];
}
