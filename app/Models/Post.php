<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'description',
        'user_id',
        'slug'
    ];

    public function myUserRelation(){ //post model belongs to use model on this foreign key
        return $this->belongsTo(User::class, 'user_id');

    }
}
