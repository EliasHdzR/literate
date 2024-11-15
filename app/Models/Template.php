<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Template extends Model
{
    use HasFactory;

    protected $table = 'templates';

    protected $fillable = [
        'name',
        'header_logo_url',
        'place',
        'greeting',
        'farewell',
        'footer_text',
        'footer_logo_url',
    ]; 
}
