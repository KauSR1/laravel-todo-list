<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $id = \Auth::user()->id;
        $tasks = User::find($id)->tasks()->get();

        return view('home', ['tasks' => $tasks]);
    }
}
