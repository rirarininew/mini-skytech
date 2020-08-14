<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Posting;
// use App\City;

class CatalogController extends Controller
{
	public function index()
    {
        $data_posting = Posting::all();
        // $data_city = City::all();
        return view ('pages.catalog.index', compact('data_posting'));
    }

    public function create()
    {
        return view('pages.catalog.addcatalog');
    }

    public function detail()
    {
        return view ('pages.catalog.detail', compact('Post'));
    }
}
