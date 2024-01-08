<?php

namespace App\Models;

use App\Models\admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table="admins";
    protected $fillable =[
        "name","email","password","gender","priv"
    ];
}
