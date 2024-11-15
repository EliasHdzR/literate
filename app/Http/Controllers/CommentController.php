<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index() {
        $comments = Comment::latest()->paginate(10);
        return view('comments.index', compact('comments'));
    }

    public function create() { return view('comments.create'); }

    public function store(Request $request) {
        $validated = $request->validate([
            'content' => 'requiered',
            'user_id' => 'requiered',
            'document_id' => 'requiered',
        ]);

        Comment::create($validated);

        return redirect()->route('comments.index')->with('success', 'Documento agregado exitosamente');
    }

    public function edit(Comments $comment) {
        return view('comments.edit', ['comment' => $comment]);
    }

    public function destroy(Comment $comment) {
        $comment->delete();
        return redirect()->route('comments.index')->with('status', 'el Documento ha sido eliminado');
    }
}
