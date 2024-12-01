<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User_Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'document_id',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function document(): BelongsTo {
        return $this->belongsTo(Document::class, 'document_id');
    }
}
