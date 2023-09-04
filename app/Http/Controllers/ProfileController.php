<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        return view('profile', compact('user'));
    }
}