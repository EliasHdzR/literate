<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Document;
use App\Models\User;
use App\Http\Controllers\TemplatesController;
use Illuminate\Routing\Controller as BaseController;


class DashboardController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $documents = Document::all();
        $templates = Template::all();
        $documents = Document::all();
        $users = User::all();
        return view('dashboard', compact('templates', 'documents', 'users'));
    }
}