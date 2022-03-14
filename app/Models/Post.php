<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'image',
        'text',
        'user_id'
    ];

    public $timestamps;

    public function user() {
        return $this->belongsTo(User::class);
    }
}
