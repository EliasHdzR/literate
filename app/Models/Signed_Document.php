<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    
    public function document(){
        return $this->belongsTo(Document::class, 'document_id');
    }
}
