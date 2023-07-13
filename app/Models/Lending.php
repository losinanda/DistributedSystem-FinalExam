<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{
    use HasFactory;
    public $incrementing = false;
    public $getKeyType = 'string';
    protected $guraded = [];
    protected $fillable = ['id', 'start_date', 'end_date',	'status', 'member_id', 'admin_id', 'book_id', 'created_at', 'updated_at'];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    // public function member()
    // {
    //     return $this->hasMany(Member::class);
    // }
}
