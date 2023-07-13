<?php

namespace App\Models;

use App\Models\Lending;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public $incrementing = false;
    public $getKeyType = 'string';
    // protected $guarded = [];
    protected $fillable = ['id', 'admin_name', 'email', 'password', 'admin_phone_number', 'admin_address', 'admin_gender', 'created_at', 'updated_at'];
    public function lending()
    {
        return $this->hasMany(Lending::class);
    }
}
