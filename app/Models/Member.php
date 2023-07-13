<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public $incrementing = false;
    public $getKeyType = 'string';
    protected $fillable = ['id', 'email', 'password', 'member_name', 'member_phone_number', 'member_address', 'member_gender', 'created_at', 'updated_at'];
    public function lending()
    {
        return $this->hasMany(Lending::class);
    }
    // public function lending()
    // {
    //     return $this->belongsTo(Lending::class);
    // }
    
}
