<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PollController extends Controller
{
    public function new()
    {
        return view('pollNew');
    }

    public function store()
    {
        return 'store';
    }
}
