<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $documents = $user->documents()->orderBy('created_at', 'desc')->get();
        return view('User.documents-index', compact('documents'));
    }
}
