<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
