<?php

namespace App\Http\Controllers;

use App\Models\Jouet;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jouets = Jouet::all(); // Récupère tous les jouets
        return view('home', compact('jouets'));
    }
}