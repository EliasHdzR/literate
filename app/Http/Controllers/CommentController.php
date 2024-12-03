<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate([
            'content' => 'required|string|max:255',
            'user_id' => 'required',
            'document_id' => 'required',
        ]);

        Comment::create($validated);

        return redirect()->route('comments.index')->with('success', 'Documento agregado exitosamente');
    }
}
