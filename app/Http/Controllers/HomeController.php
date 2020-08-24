<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Posting;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_user = Posting::selectraw('user_id')->where('status','new')->count();

        $data_sku = Posting::selectraw('product_sku')
                    ->selectraw('user_id')
                    ->selectraw('count(user_id) as total_posting')
                    ->groupBy('product_sku')
                    ->groupBy('user_id')
                    ->orderBy('created_at','asc')
                    ->skip(0)->take(3)->get();

        $data_posting = Posting::selectraw('SUM(IF(status="new", 1, 0)) as total_status_new')
                        ->selectraw('SUM(IF(status="renew", 1, 0)) as total_status_renew')
                        ->selectraw('user_id')
                        ->groupBy('user_id')
                        ->skip(0)->take(10)->get();

        return view ('home', compact('data_user','data_sku','data_posting'));
    }
}
