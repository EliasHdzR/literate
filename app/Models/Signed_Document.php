<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Signed_Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'signature_date',
        'original_string',
        'cfdi',
        'base64',
        'document_id',
    ];

    public function document(): BelongsTo {
        return $this->belongsTo(Document::class, 'document_id');
    }
}
