<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $id = \Auth::user()->id;
        $filter = $request->query('filter', 'all');

        $tasks = User::find($id)->tasks();

        if ($filter === 'pending') {
            $tasks->where('priority', '!=', 2);
        } elseif ($filter === 'completed') {
            $tasks->where('priority', 2);
        }

        $tasks = $tasks->get();

        return view('home', ['tasks' => $tasks]);
    }
}
