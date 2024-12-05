<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $bio = Biodata::where('id_user', Auth::user()->id)->get()->all();
        return view('home', compact('bio'));
    }
}

