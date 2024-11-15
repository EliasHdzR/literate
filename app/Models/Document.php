<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

    protected $table = 'templates';

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
    ]; 
}
