<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'news_content',
        'author',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'author', 'id');
    }
}
