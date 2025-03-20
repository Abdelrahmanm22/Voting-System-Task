<?php

namespace App\Http\Controllers\Web\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index()
    {
        return view('front.index');
    }
}
