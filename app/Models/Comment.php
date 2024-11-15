<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'document_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function document(){
        return $this->belongsTo(Document::class, 'document_id');
    }
}
