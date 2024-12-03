<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function createOriginalString(){
        $originalString =  '||' . $this->name . '||' . $this->folio . '||' . $this->place . '||' . $this->receiver_name . '||' . $this->receiver_position;
        if($this->greeting){
            $originalString = $originalString . '||' . $this->greeting;
        }

        $originalString = $originalString . '||' . $this->body;
        if($this->farewell){
            $originalString = $originalString . '||' . $this->farewell;
        }

        $originalString = $originalString . '||' . $this->issuer_name . '||' . $this->issuer_position;
        if($this->footer_text){
            $originalString = $originalString . '||' . $this->footer_text;
        }

        return $originalString;

    }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'users_documents', 'document_id', 'user_id');
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }

    public function signedDocument(): HasOne {
        return $this->hasOne(Signed_Document::class);
    }
}
