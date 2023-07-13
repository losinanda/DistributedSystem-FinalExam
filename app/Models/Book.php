<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $incrementing = false;
    public $getKeyType = 'string';
    protected $fillable = ['id', 'title', 'status', 'shelf', 'image', 'created_at', 'updated_at'];
    public function lending()
    {
        return $this->hasMany(Lending::class);
    }
}
