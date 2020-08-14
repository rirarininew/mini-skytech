<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
	public function index()
    {
        return view('pages.stock.stock');
    }
    
    public function create()
    {
        return view('pages.stock.addstock');
    }

    public function detail()
    {
        return view('pages.stock.detail');
    }
}
