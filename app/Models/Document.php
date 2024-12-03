<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $fillable = [
        'name',
        'folio',
        'header_logo_url',
        'place',
        'receiver_name',
        'receiver_position',
        'greeting',
        'body',
        'farewell',
        'issuer_name',
        'issuer_position',
        'footer_text',
        'footer_logo_url',
        'signature_limit_date',
        'status',
    ];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'users_documents', 'document_id', 'user_id');
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }
}
